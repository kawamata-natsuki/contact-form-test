<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Laravel\Fortify\Fortify;

class CustomRegisterResponse implements RegisterResponseContract
{
  # 新規登録後は/login にリダイレクトする
  public function toResponse($request)
  {
    return $request->wantsJson()
      ? new JsonResponse('', 201)
      : redirect('/login');
  }
}
