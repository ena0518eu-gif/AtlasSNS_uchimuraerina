<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function search(Request $request)
    {
        // 検索ワード取得
        $keyword = $request->input('keyword');

        // クエリ作成
        $query = User::query();

        // 自分以外のユーザーを対象
        $query->where('id', '!=', Auth::id());

        // 検索されている場合は部分一致
        if (!empty($keyword)) {
            $query->where('username', 'like', '%' . $keyword . '%');
        }

        // データ取得
        $users = $query->get();  // 配列に変換せずそのまま取得

        // ログインユーザーがフォローしているユーザーのIDを取得
        // ※ 未ログイン時エラー防止
        $followedUserIds = Auth::check()
            ? Auth::user()->follows()->pluck('followed_id')->toArray()
            : [];

        return view('users.search', compact('users', 'keyword', 'followedUserIds'));
    }

    // 相手ユーザーのプロフィール表示
    public function show($id)
    {
        // URLの{id}から対象ユーザーを取得
        $user = User::with(['posts' => function ($query) {
            $query->orderBy('created_at', 'desc'); // 投稿順を新しい順に並べる
        }])->find($id);

        // ログインユーザーが相手ユーザーをフォローしているか確認
        $isFollowed = Auth::check() ? Auth::user()->follows()->where('followed_id', $id)->exists() : false;

        // 相手ユーザーのプロフィール画面へ渡す
        return view('users.profile', compact('user', 'isFollowed'));
    }
}
