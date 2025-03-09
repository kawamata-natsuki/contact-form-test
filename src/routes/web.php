<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AuthenticatedUserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogioutController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

# お問い合わせフォーム入力画面の表示
Route::get('/', [ContactController::class, 'create'])->name('contact.create');

# お問い合わせフォーム確認画面の表示
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

# 確認画面をGET表示
Route::get('/confirm', [ContactController::class, 'showConfirm'])->name('contact.showConfirm');

# お問い合わせフォームで入力したデータの保存・
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

# サンクスページの表示
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');


/* --------------------------------------------------------------ここからFortifyの設定
---------------------------------------------------------------*/


# ユーザー登録画面の表示
Route::get('register', function () {
  return view('auth.register');
})->name('register');

# ユーザー登録処理
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

# ログイン画面の表示
Route::get('/login', function () {
  return view('auth.login');
})->name('login');



/*
# 管理画面の表示
Route::middleware(['auth'])->group(function () {
  Route::get('/admin', function () {
    return view('admin');
  })->name('admin');
});


# ログイン画面のバリデーション実装
Route::get('login', function () {
  return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.process');

Route::post('/register', [RegisterdUserController::class, 'store']);
*/
