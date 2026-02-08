<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post; // Postモデルをインポート
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    // フォロー一覧表示
    public function followList()
    {
        // ログインユーザーの情報取得
        $user = Auth::user();

        // ユーザーがフォローしているユーザーの投稿を取得
        // with('posts') で投稿も同時取得
        // ↓↓↓ 投稿単位で取得するように修正 ↓↓↓

        // フォローしているユーザーIDを取得
        $followIds = $user->follows()->pluck('users.id');

        // フォローしているユーザーの投稿を新しい順で取得
        $posts = Post::with('user')
            ->whereIn('user_id', $followIds)
            ->orderBy('created_at', 'desc')
            ->get();

        // ビューに渡す
        return view('follows.followList', compact('posts'));
    }

    // フォロワー一覧表示
    public function followerList()
    {
        // ログインユーザーの情報取得
        $user = Auth::user();

        // ユーザーをフォローしているユーザー＋投稿を取得

        // フォロワーのIDを取得
        $followerIds = $user->followers()->pluck('users.id');

        // フォロワーの投稿を新しい順で取得
        $posts = Post::with('user')
            ->whereIn('user_id', $followerIds)
            ->orderBy('created_at', 'desc')
            ->get();

        // ビューに渡す
        return view('follows.followerList', compact('posts'));
    }

    // フォローする処理
    public function store($userId)
    {
        $user = Auth::user();

        // すでにフォローしていない場合にフォローする
        if (!$user->follows()->where('followed_id', $userId)->exists()) {
            $user->follows()->attach($userId);
        }

        // フォロー後、前のページに戻る
        return redirect()->back();
    }

    // フォロー解除処理
    public function destroy($userId)
    {
        $user = Auth::user();

        // フォローしている場合は解除する
        if ($user->follows()->where('followed_id', $userId)->exists()) {
            $user->follows()->detach($userId);
        }

        // フォロー解除後、前のページに戻る
        return redirect()->back();
    }
}
