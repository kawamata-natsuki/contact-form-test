<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Fortify;

class CustomLoginResponse implements LoginResponseContract
{
  # ログイン後のリダイレクト先を指定
  public function toResponse($request)
  {
    return $request->wantsJson()
      ? response()->json(['two_factor' => false])
      : redirect('/admin');
  }
}
