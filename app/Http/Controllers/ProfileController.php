<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;

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
    public function update(ProfileUpdateRequest $request)
    {
        // =========================
        // バリデーション
        // =========================
        // ※ ProfileUpdateRequest にて自動実行
        // 追記：NewPassword は必須・英数字のみ・8文字以上20文字以内
        // ProfileUpdateRequest 内で rules() に記述

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
        // 入力がある場合のみ更新
        if ($request->filled('new_password')) {   // ← ここを追加
            $user->password = bcrypt($request->new_password);
        }

        // =========================
        // アイコン画像
        // =========================
        if ($request->hasFile('icon_image')) {

            // public/images/icons に保存
            $file = $request->file('icon_image');

            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('images/icons'), $fileName);

            // DBにはファイル名のみ保存
            $user->icon_image = $fileName;
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
