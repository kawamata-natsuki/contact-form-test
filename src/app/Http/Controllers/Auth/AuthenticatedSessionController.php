<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AuthenticatedSessionController extends Controller
{
  // ログイン処理
  public function store(Request $request)
  {
    # バリデーションチェック
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    # 認証処理
    if (!Auth::attempt($credentials, $request->boolean('remember'))) {
      throw ValidationException::withMessages([
        'email' => __('auth.failed'),
      ]);
    }

    # セッションの再生成（セキュリティ対策）
    $request->session()->regenerate();

    # ログイン成功時のリダイレクト
    return redirect()->intended('/admin');
  }

  // ログアウト処理
  public function destroy(Request $request)
  {
    # ユーザーをログアウトさせる
    Auth::logout();

    # セッションの無効化
    $request->session()->invalidate();

    # CSRFトークンを再生成（セキュリティ対策）
    $request->session()->regenerateToken();

    # ログアウト後は/login に遷移
    return redirect('/login');
  }
}