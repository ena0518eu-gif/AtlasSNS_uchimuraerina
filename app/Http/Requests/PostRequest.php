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

    // エラーメッセージ（日本語）
    public function messages()
    {
        return [
            'post.required' => 'つぶやきを入力してください。',
            'post.string'   => '文字を入力してください。',
            'post.min'      => '1文字以上入力してください。',
            'post.max'      => '150文字以内で入力してください。',
        ];
    }
}
