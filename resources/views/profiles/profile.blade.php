@extends('layouts.app')

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

<div class="profile-area">
  <div class="profile-card">

    <!-- =========================
      プロフィール全体（横並び）
    ========================= -->
    <div class="profile-wrap">

      <!-- =========================
        左：ユーザーアイコン
      ========================= -->
      <div class="profile-icon">
        <img src="{{ $user->icon_path ? asset($user->icon_path) : asset('images/icon1.png') }}">
      </div>

      <!-- =========================
        右：プロフィール編集フォーム
      ========================= -->
      <form class="profile-form"
            action="{{ route('profile.update') }}"
            method="POST"
            enctype="multipart/form-data">
        @csrf

        <!-- =========================
          ユーザー名
        ========================= -->
        <div class="form-group">
          <label>ユーザー名</label>
          <input type="text" name="username" value="{{ $user->username }}">
        </div>

        <!-- =========================
          メールアドレス
        ========================= -->
        <div class="form-group">
          <label>メールアドレス</label>
          <input type="email" name="email" value="{{ $user->email }}">
        </div>

        <!-- =========================
          パスワード
        ========================= -->
        <div class="form-group">
          <label>パスワード</label>
          <input type="password" name="password">
        </div>

        <!-- =========================
          パスワード確認
        ========================= -->
        <div class="form-group">
          <label>パスワード確認</label>
          <input type="password" name="password_confirmation">
        </div>

        <!-- =========================
          自己紹介
        ========================= -->
        <div class="form-group">
          <label>自己紹介</label>
          <textarea name="bio">{{ $user->bio }}</textarea>
        </div>

        <!-- =========================
          アイコン画像
        ========================= -->
        <div class="form-group">
          <label>アイコン画像</label>
          <input type="file" name="icon">
        </div>

        <!-- =========================
          更新ボタン
        ========================= -->
        <div class="form-btn">
          <button type="submit">更新</button>
        </div>

      </form>

    </div><!-- /.profile-wrap -->

  </div><!-- /.profile-card -->
</div><!-- /.profile-area -->

@endsection
