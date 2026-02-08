@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection

@section('content')

<!-- =========================
  プロフィール編集
========================= -->
<div class="profile-area">
  <div class="profile-card">

    <!-- =========================
      プロフィール全体（横並び）
    ========================= -->
    <div class="profile-wrapper">

      <!-- 左：ユーザーアイコン -->
      <div class="profile-icon-area">
        <img src="{{ $user->icon_path ? asset('storage/' . $user->icon_path) : asset('images/icon1.png') }}">
      </div>

      <!-- 右：フォーム -->
      <div class="profile-form-area">
        <form action="{{ route('profile.update') }}"
              method="POST"
              enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label>ユーザー名</label>
            <input type="text" name="username" value="{{ $user->username }}">
          </div>

          <div class="form-group">
            <label>メールアドレス</label>
            <input type="email" name="email" value="{{ $user->email }}">
          </div>

          <div class="form-group">
            <label>パスワード</label>
            <input type="password" name="password">
          </div>

          <div class="form-group">
            <label>パスワード確認</label>
            <input type="password" name="password_confirmation">
          </div>

          <div class="form-group">
            <label>自己紹介</label>
            <textarea name="bio">{{ $user->bio }}</textarea>
          </div>

          <div class="form-group">
            <label>アイコン画像</label>
            <input type="file" name="icon">
          </div>

          <div class="form-btn">
            <button type="submit">更新</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>

@endsection
