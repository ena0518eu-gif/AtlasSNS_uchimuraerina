<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    // つぶやき投稿の条件
    public function rules()
    {
        return [
            'post' => ['required', 'string', 'min:1', 'max:150'],
        ];
    }
}
