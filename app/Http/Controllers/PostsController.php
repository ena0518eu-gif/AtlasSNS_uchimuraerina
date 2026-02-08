<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // =========================
    // 投稿一覧（トップページ）
    // =========================
    public function index()
    {
        // ログインユーザー取得
        $user = Auth::user();

        // フォローしているユーザーID取得
        $followIds = $user->follows()->pluck('followed_id');

        // =========================
        // 自分 + フォロー中ユーザーの投稿のみ取得
        // =========================
        $posts = Post::with('user')
            ->where(function ($query) use ($followIds, $user) {

                // フォロー中ユーザーの投稿
                $query->whereIn('user_id', $followIds)

                    // 自分の投稿
                    ->orWhere('user_id', $user->id);

            })
            ->latest()
            ->get();

        return view('posts.index', compact('posts'));
    }

    // =========================
    // 投稿保存
    // =========================
    public function store(PostRequest $request)
    {
        // =========================
        // 150文字以上は保存不可（サーバー側制御）
        // =========================
        $postContent = mb_substr($request->post, 0, 150);

        Post::create([
            'user_id' => auth()->id(),
            'post' => $postContent,
        ]);

        return redirect()->back();
    }

    // =========================
    // 投稿更新（編集）
    // =========================
    public function update(Request $request, $id)
    {
        // =========================
        // 150文字以上は保存不可（サーバー側制御）
        // =========================
        $postContent = mb_substr($request->post, 0, 150);

        // =========================
        // 自分の投稿のみ更新
        // =========================
        Post::where('id', $id)
            ->where('user_id', auth()->id())
            ->update([
                'post' => $postContent
            ]);

        return redirect('/top');
    }

    // =========================
    // 投稿削除
    // =========================
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // =========================
        // 自分の投稿のみ削除可能
        // =========================
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();

        return redirect()->back();
    }
}
