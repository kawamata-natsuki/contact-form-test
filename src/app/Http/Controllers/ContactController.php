<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    # お問い合わせフォーム入力画面の処理
    public function create(Request $request)
    {
        $contact = session('contact', []);
        return view('index', compact('contact'));
    }

    # お問い合わせフォーム確認画面の処理
    public function confirm(ContactRequest $request)
    {
        # バリデーションを通過したデータを取得
        $validated = $request->validated();

        # 性別のマッピング
        $validated['genderText'] = [1 => '男性', 2 => '女性', 3 => 'その他'][$validated['gender']];

        # 電話番号の結合
        $validated['tel'] = $validated['area_code'] . $validated['prefix'] . $validated['suffix'];

        # 建物名が未入力の場合（エラー防止）
        $validated['building'] = $validated['building'] ?? '';

        # content を category　に変更（キーをDBと合わせる）
        $validated['category_id'] = $validated['content'];

        # お問い合わせ情報の種類のマッピング
        $categoryMap = [
            '商品のお届けについて' => 1,
            '商品の交換について' => 2,
            '商品トラブル' => 3,
            'ショップへのお問い合わせ' => 4,
            'その他' => 5
        ];

        # category_idを数値にする
        $validated['category_id'] = $categoryMap[$validated['content']];

        # 不要なキーを削除
        unset($validated['area_code'], $validated['prefix'], $validated['suffix'], $validated['content']);

        # セッション保存
        session([
            'contact' => $validated,
            'area_code' => $request->area_code,
            'prefix' => $request->prefix,
            'suffix' => $request->suffix,
            'content' => $request->content,
        ]);

        // GET画面へリダイレクト
        return redirect()->route('contact.showConfirm');
    }

    public function showConfirm()
    {
        $contact = session('contact');

        if (!$contact) {
            return redirect()->route('contact.create');
        }

        return view('confirm', compact('contact'));
    }

    # お問い合わせフォームのデータ保存の処理
    public function store(Request $request)
    {
        $contact = session('contact');


        if (!$contact) {
            // セッションにデータが無ければ入力画面に戻す
            return redirect()->route('contact.create');
        }

        # データベースに保存
        Contact::create([
            'last_name'   => $contact['last_name'],
            'first_name'  => $contact['first_name'],
            'gender'      => $contact['gender'],
            'email'       => $contact['email'],
            'address'     => $contact['address'],
            'building'    => $contact['building'] ?? '',
            'tel'         => $contact['tel'],
            'detail'      => $contact['detail'],
            'category_id' => $contact['category_id'],
        ]);

        // セッションを削除する（データのクリア）
        session()->forget('contact');

        return redirect()->route('contact.thanks');
    }

    # サンクスページの表示
    public function thanks()
    {
        return view('thanks');
    }
}
