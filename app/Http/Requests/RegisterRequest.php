<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|min:2|max:12',
            'email' => 'required|email|min:5|max:40|unique:users,email',
            'password' => 'required|alpha_num|min:8|max:20',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            // username
            'username.required' => 'ユーザー名は必須です',
            'username.min' => 'ユーザー名は2文字以上で入力してください',
            'username.max' => 'ユーザー名は12文字以内で入力してください',

            // email
            'email.required' => 'メールアドレスは必須です',
            'email.email' => 'メールアドレス形式で入力してください',
            'email.min' => 'メールアドレスは5文字以上で入力してください',
            'email.max' => 'メールアドレスは40文字以内で入力してください',
            'email.unique' => 'このメールアドレスは既に登録されています',

            // password
            'password.required' => 'パスワードは必須です',
            'password.alpha_num' => 'パスワードは英数字のみで入力してください',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.max' => 'パスワードは20文字以内で入力してください',

            // password_confirmation
            'password_confirmation.required' => '確認用パスワードは必須です',
            'password_confirmation.same' => 'パスワードと一致しません',
        ];
    }
}
