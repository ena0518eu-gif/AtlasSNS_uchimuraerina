<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|min:2|max:12',
            'email' => 'required|email|min:5|max:40',
            'new_password' => 'required|alpha_num|min:8|max:20',
            'new_password_confirmation' => 'required|same:new_password',
            'bio' => 'max:150',
            'icon_image' => 'mimes:jpg,png,bmp,gif,svg',
        ];
    }
}
