<?php

use App\Http\Controllers\ContactController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;




# お問い合わせフォーム確認画面の表示（入力内容の送信）
Route::post('/confirm', [ContactController::class, 'confirm']);

# お問い合わせフォーム入力画面の表示
Route::get('/', [ContactController::class, 'index']);


# お問い合わせフォームで入力したデータの保存・サンクスページへリダイレクト
Route::post('/contact', [ContactController::class, 'store']);

# お問い合わせフォーム確認画面で修正ボタンを押した際にお問い合わせフォーム入力画面に戻る
Route::post('/', [ContactController::class, 'index']);

# サンクスページの表示
Route::get('/thanks', [ContactController::class, 'thanks']);

# 管理画面の表示
Route::middleware(['auth'])->group(function () {
  Route::get('/admin', function () {
    return view('admin');
  });
});
