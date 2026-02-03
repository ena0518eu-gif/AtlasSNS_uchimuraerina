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
}
