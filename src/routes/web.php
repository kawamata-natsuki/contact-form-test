<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
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

# ログイン後のリダイレクト先（/admin）を表示
Route::get('/admin', function () {
  return view('admin');
})->middleware('auth')->name('admin');

# ログイン処理
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

# ログアウト処理
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

/* --------------------------------------------------------------
ここからadminの設定
---------------------------------------------------------------*/

# 管理画面の表示
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

# お問い合わせのデータ削除（モーダルウィンドウ内の処理）
Route::delete('/admin/contact/{id}', [AdminController::class, 'destroy'])->name('admin.contact.destroy');

# エクスポート機能
Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');
