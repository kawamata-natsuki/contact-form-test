<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    # お問い合わせフォーム入力画面の表示
    public function index(Request $request)
    {
        session()->flashInput($request->input()); //セッションに入力値を保存
        return view('index');
    }

    # お問い合わせフォーム確認画面の表示
    //フォームから送信された値を受取り、$contactsに格納してconfirmビューに渡す//
    public function confirm(ContactRequest $request)
    {
        $validated = $request->validated();
        // バリデーションを通過したデータを取得

        # 性別のマッピング
        $genderMap = [1 => '男性', 2 => '女性', 3 => 'その他'];
        $validated['genderText'] = $genderMap[$validated['gender']];

        # 電話番号の結合
        $validated['tel'] = $validated['area_code'] . $validated['prefix'] . $validated['suffix'];

        # 建物名が未入力の場合（エラー防止）
        $validated['building'] = $validated['building'] ?? '';

        return view('confirm', [
            'contact' => $validated,
        ]);
    }




    # データの保存
    /*
    public function store(Request $request)
    {

        $contact = $request->all(); //ビュー表示確認のため後で要修正
        Contact::create($contact); //ビュー表示確認のため後で要修正
        return redirect('/thanks');
    }
    */

    # サンクスページの表示ルーティング確認用 後で削除
    public function store()
    {
        return redirect('/thanks');
    }

    # サンクスページの表示
    public function thanks()
    {
        return view('thanks');
    }
}
