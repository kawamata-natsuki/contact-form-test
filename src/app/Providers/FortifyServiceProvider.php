<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        # ユーザー登録ページのビュー指定
        Fortify::registerView(function () {
            return view('auth.register');
        });

        # ユーザー登録処理
        Fortify::createUsersUsing(CreateNewUser::class);

        # Fortify のログインビューを無効化（ルートを自作するため）
        Fortify::loginView(fn() => abort(404));

        # ログインのバリデーション適用
        $this->app->singleton(\Laravel\Fortify\Contracts\LoginResponse::class, LoginController::class);

        # ログイン回数の制限を設定
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            return Limit::perMinute(10)->by($email . $request->ip());
        });

        # ログアウト後のリダイレクト先を/loginに変更
        Route::post('/logout', function () {
            return redirect('/login');
        });
    }
}
