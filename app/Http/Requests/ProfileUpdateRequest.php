<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // ユーザー名
            'username' => 'required|min:2|max:12',

            // メールアドレス（自分以外は重複不可）
            'email' => [
                'required',
                'email',
                'min:5',
                'max:40',
                Rule::unique('users', 'email')->ignore($this->user()->id),
            ],

            // 新しいパスワード
            'new_password' => 'required|alpha_num|min:8|max:20',

            // パスワード確認
            'new_password_confirmation' => 'required|alpha_num|min:8|max:20|same:new_password',

            // 自己紹介
            'bio' => 'nullable|max:150',

            // アイコン画像
            'icon_image' => 'nullable|mimes:jpg,png,bmp,gif,svg',
        ];
    }

    public function messages()
    {
        return [

            // =====================
            // UserName
            // =====================
            'username.required' => '入力必須です',
            'username.min' => '2文字以上で入力してください',
            'username.max' => '12文字以内で入力してください',

            // =====================
            // MailAddress
            // =====================
            'email.required' => '入力必須です',
            'email.email' => 'メールアドレスの形式で入力してください',
            'email.min' => '5文字以上で入力してください',
            'email.max' => '40文字以内で入力してください',
            'email.unique' => '既に登録されているメールアドレスです',

            // =====================
            // NewPassword
            // =====================
            'new_password.required' => '入力必須です',
            'new_password.alpha_num' => '英数字のみで入力してください',
            'new_password.min' => '8文字以上で入力してください',
            'new_password.max' => '20文字以内で入力してください',

            // =====================
            // NewPasswordConfirmation
            // =====================
            'new_password_confirmation.required' => '入力必須です',
            'new_password_confirmation.alpha_num' => '英数字のみで入力してください',
            'new_password_confirmation.min' => '8文字以上で入力してください',
            'new_password_confirmation.max' => '20文字以内で入力してください',
            'new_password_confirmation.same' => 'パスワードが一致していません',

            // =====================
            // Bio
            // =====================
            'bio.max' => '150文字以内で入力してください',

            // =====================
            // IconImage
            // =====================
            'icon_image.mimes' => '画像ファイル（jpg,png,bmp,gif,svg）のみアップロード可能です',
        ];
    }
}
