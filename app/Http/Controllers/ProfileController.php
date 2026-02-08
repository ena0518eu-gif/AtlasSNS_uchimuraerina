<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profiles.profile', compact('user'));
    }

    // =========================
    // プロフィール更新処理
    // =========================
    public function update(Request $request)
    {
        // =========================
        // バリデーション
        // =========================
        $request->validate([

            // -------------------------
            // ユーザー名
            // -------------------------
            'username' => 'required|min:2|max:12',

            // -------------------------
            // メールアドレス
            // -------------------------
            'email' => 'required|email|min:5|max:40|unique:users,email,' . Auth::id(),

            // -------------------------
            // パスワード
            // 仕様通り：必須 / 英数字 / 8〜20
            // -------------------------
            'password' => [
                'required',
                'string',
                'alpha_num',       // ← 英数字のみ
                'min:8',
                'max:20',
                'confirmed',       // password_confirmationと一致
            ],

            // -------------------------
            // 自己紹介
            // -------------------------
            'bio' => 'nullable|max:150',

            // -------------------------
            // アイコン画像
            // -------------------------
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif,svg',

        ]);

        $user = Auth::user();

        // =========================
        // テキスト情報更新
        // =========================
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->bio      = $request->bio;

        // =========================
        // パスワード更新
        // =========================
        $user->password = bcrypt($request->password);

        // =========================
        // アイコン画像
        // =========================
        if ($request->hasFile('icon')) {

            // public/storage/icons に保存
            $path = $request->file('icon')->store('icons', 'public');

            // DBには相対パスのみ保存
            $user->icon_path = $path;
        }

        // =========================
        // 保存
        // =========================
        $user->save();

        // =========================
        // TOPへ戻る
        // =========================
        return redirect('/top');
    }
}
