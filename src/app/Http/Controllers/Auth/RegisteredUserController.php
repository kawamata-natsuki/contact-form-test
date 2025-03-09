<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use Laravel\Fortify\Fortify;

// 新規登録の処理 //
class RegisteredUserController extends Controller
{

  # 登録画面（/register）を表示
  public function create(Request $request): RegisterViewResponse
  {
    return app(RegisterViewResponse::class);
  }

  # 新規ユーザーの登録処理（リクエストの処理）
  public function store(
    Request $request,
    CreatesNewUsers $creator
  ): RegisterResponse {
    if (config('fortify.lowercase_usernames')) {
      $request->merge([
        Fortify::username() => Str::lower($request->{Fortify::username()}),
      ]);
    }

    # 新規ユーザー作成
    event(new Registered($user = $creator->create($request->all())));

    # 新規登録後のリダイレクト
    return app(RegisterResponse::class);
  }
}
