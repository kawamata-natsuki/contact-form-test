<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email|max:255',
            'password' => 'required|string|min:8|max:72|regex:/^[a-zA-Z0-9]+$/',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'email.exists' => 'このメールアドレスは登録されていません',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは8文字以上の半角英数字で入力してください',
            'password.regex' => 'パスワードは8文字以上の半角英数字で入力してください',
        ];
    }
}
