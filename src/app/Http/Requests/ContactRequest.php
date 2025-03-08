<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'gender' => 'required|in:1,2,3',
            'email' => 'required|email|,max:255',
            'area_code' => 'nullable|digits_between:1,5|numeric',
            'prefix' => 'nullable|digits_between:1,5|numeric',
            'suffix' => 'nullable|digits_between:1,5|numeric',
            'address' => 'required|string',
            'building' => 'nullable|string',
            'content' => 'required',
            'detail' => 'required|string|max:120',
        ];
    }




    // メールアドレスのバリデーション　ポップアップみたいな感じになる//
    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスはメール形式で入力してください',
            'area_code.digits_between' => '電話番号は5桁までの数字で入力してください',
            'area_code.numeric' => '電話番号は5桁までの数字で入力してください',
            'prefix.digits_between' => '電話番号は5桁までの数字で入力してください',
            'prefix.numeric' => '電話番号は5桁までの数字で入力してください',
            'suffix.digits_between' => '電話番号は5桁までの数字で入力してください',
            'suffix.numeric' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'content.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問合せ内容は120文字以内で入力してください',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // いずれかの入力欄が未入力の場合
            if (!$this->input('area_code') || !$this->input('prefix') || !$this->input('suffix')) {
                $validator->errors()->add('tel', '電話番号を入力してください');
            }
        });
    }
}