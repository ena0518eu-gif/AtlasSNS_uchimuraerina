<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 初期アクセスはトップへ
Route::get('/', function () {
    return redirect('/top');
});

// 認証関連
require __DIR__ . '/auth.php';

// ログイン必須ページ
Route::middleware('auth')->group(function () {

    // トップ（投稿一覧）
    Route::get('top', [PostsController::class, 'index'])
         ->name('top');

    // 投稿作成
    Route::post('posts', [PostsController::class, 'store'])
         ->name('posts.store');

    // 投稿更新（編集）
    Route::put('posts/{id}', [PostsController::class, 'update'])
         ->name('posts.update');

    // 投稿削除
    Route::delete('posts/{id}', [PostsController::class, 'destroy'])
         ->name('posts.destroy');

    // プロフィール表示（編集画面）
    Route::get('profile', [ProfileController::class, 'profile'])
         ->name('profile.edit');

    // プロフィール更新処理
    Route::put('profile/update', [ProfileController::class, 'update'])  // 修正：POST → PUT
         ->name('profile.update');

   // ユーザー検索
    Route::get('search', [UsersController::class, 'search'])
         ->name('search');

    // フォロー一覧
    Route::get('follow-list', [FollowsController::class, 'followList'])
         ->name('follow.list');

    // フォロワー一覧
    Route::get('follower-list', [FollowsController::class, 'followerList'])
         ->name('follower.list');

    // ユーザー詳細
    Route::get('user/{id}', [UsersController::class, 'show'])
         ->name('user.show');

    // フォローする処理
    Route::post('follow/{userId}', [FollowsController::class, 'store'])
         ->name('follow.store');

    // フォロー解除処理
    Route::delete('follow/{userId}', [FollowsController::class, 'destroy'])
         ->name('follow.destroy');

    // 相手プロフィール表示
    Route::get('profile/{id}', [UsersController::class, 'show'])
         ->name('profile.show');
});
