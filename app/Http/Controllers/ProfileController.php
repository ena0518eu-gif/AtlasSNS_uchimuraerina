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
        $user->password = bcrypt($request->new_password);

        // =========================
        // アイコン画像
        // =========================
        if ($request->hasFile('icon_image')) {

            // public/storage/icons に保存
            $path = $request->file('icon_image')->store('icons', 'public');

            // DBには相対パスのみ保存
            $user->icon_image = $path;
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
