<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        # リセットボタンで検索条件をクリア
        if ($request->has('reset')) {
            return redirect('/admin');
        }

        # Contactモデルとそれに紐づくcategoryモデルのデータを取得
        $query = Contact::with('category');

        # 検索条件の取得
        $search = $request->input('search');
        $gender = $request->input('gender');
        $category_id = $request->input('category_id');
        $date = $request->input('date');

        # 検索ワードの文字列を全て小文字に変換
        $searchLower = strtolower($search);
        # 部分一致か完全一致で検索する
        $searchMatchType = $request->input('match_type', 'partial');

        # 名前もしくはメールアドレスでの検索処理
        if (!empty($searchLower)) {
            $query->where(function ($q) use ($searchLower, $searchMatchType) {
                if ($searchMatchType === 'exact') {
                    $q->where('first_name', $searchLower)
                        ->orWhere('last_name', $searchLower)
                        ->orWhere('email', $searchLower);
                } else {
                    $q->where('first_name', 'LIKE', "%{$searchLower}%")
                        ->orWhere('last_name', 'LIKE', "%{$searchLower}%")
                        ->orWhere('email', 'LIKE', "%{$searchLower}%");
                }
            });
        }

        # 性別での検索
        if (!empty($gender)) {
            if ($gender === "all") {
                $query->whereIn('gender', [1, 2, 3]);
            } elseif (in_array($gender, ["1", "2", "3"])) {
                $query->where('gender', $gender);
            }
        }

        # お問い合わせ情報の種類での検索
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }

        # 作成日での検索
        if (!empty($date)) {
            $query->whereDAte('created_at', $date);
        }

        # ページネーション
        $contacts = $query->paginate(7)->onEachside(2);

        # 検索条件をページネーションに引き継ぐ
        $contacts->appends($request->query());

        return view('admin', compact('contacts'));
    }

    public function destroy($id)
    {
        # データの削除処理（モーダルウィンドウ内）
        $contact = Contact::findOrFail($id);
        $contact->delete(); // 論理削除

        return redirect()->route('admin.index')->with('success', '削除しました');
    }

    public function export(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('gender') && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('creqated_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        # ストリームレスポンスを返す
        $response = new StreamedResponse(
            function () use ($query) {
                $handle = fopen('php://output', 'w');
                // ヘッダー行を追加
                fputcsv($handle, ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類', 'お問い合わせ内容', '登録日']);
                // データを書き込む
                $query->chunk(100, function ($contacts) use ($handle) {
                    foreach ($contacts as $contact) {
                        fputcsv($handle, [
                            $contact->last_name . ' ' . $contact->first_name,
                            $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他'),
                            $contact->email,
                            $contact->category->content ?? '未分類',
                            $contact->detail,
                            $contact->created_at->format('Y-m-d'),
                        ]);
                    }
                });

                fclose($handle);
            }
        );

        // レスポンスヘッダーを設定
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="contacts_export.csv"');

        return $response;
    }
}
