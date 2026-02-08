<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    // ログイン画面
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    // ログイン処理
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // 新規登録画面
    Route::get('register', [RegisteredUserController::class, 'create']);

    // 新規登録処理
    Route::post('register', [RegisteredUserController::class, 'store']);

    // 登録完了画面
    Route::get('added', function () {
        return view('auth.added');
    })->name('added');
});

// ログアウト処理
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
