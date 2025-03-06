<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    # お問い合わせフォーム入力画面の表示
    public function index()
    {
        return view('index');
    }

    # お問い合わせフォーム確認画面の表示
    // フォームから送信された値を受取り、$contactに格納してconfirmビューに渡す
    public function confirm(Request $request)
    {
        $contact = $request->all();
        return view('confirm', compact('contact'));
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
