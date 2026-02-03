<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profiles.profile');
    }

    // プロフィール更新処理
    public function update(Request $request)
    {
        // ===== バリデーション =====
        $request->validate([

            // ユーザー名
            'username' => 'required|min:2|max:12',

            // メールアドレス
            'email' => 'required|email|min:5|max:40|unique:users,email,' . Auth::id(),

            // パスワード
            'password' => 'nullable|alpha_num|min:8|max:20|confirmed',

            // 自己紹介
            'bio' => 'nullable|max:150',

            // アイコン画像
            'icon' => 'nullable|image|mimes:jpg,png,bmp,gif,svg',

        ]);

        $user = Auth::user();

        // テキスト情報更新
        $user->username = $request->username;
        $user->email = $request->email;
        $user->bio = $request->bio;

        // パスワード（入力された時だけ）
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // アイコン画像
        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('public/icons');
            $user->icon_path = str_replace('public/', 'storage/', $path);
        }

        // 保存
        $user->save();

        // TOPへ戻る
        return redirect('/top');
    }
}
