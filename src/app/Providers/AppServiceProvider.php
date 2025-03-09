<?php

namespace App\Providers;

use App\Http\Responses\CustomLoginResponse;
use App\Http\Responses\CustomRegisterResponse;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;


class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        # 新規登録後のレスポンスとしてCustomRegisterResponseを使えるように登録
        $this->app->singleton(RegisterResponse::class, CustomRegisterResponse::class);

        # ログイン後のレスポンスとしてCustomLoginResponseを使えるように登録
        $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);
    }

    public function boot()
    {
        //
    }
}
