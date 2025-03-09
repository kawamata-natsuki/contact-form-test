<?php

namespace App\Providers;

use App\Http\Responses\CustomRegisterResponse;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\RegisterResponse;


class AppServiceProvider extends ServiceProvider
{
    # 新規登録後のレスポンスとしてCustomRegisterResponseを使えるように登録
    public function register()
    {
        $this->app->singleton(RegisterResponse::class, CustomRegisterResponse::class);
    }

    public function boot()
    {
        //
    }
}
