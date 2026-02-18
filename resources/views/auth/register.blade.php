@extends('layouts.logout')

@section('content')

<div class="login-wrapper">

  <div class="login-logo">
    <img src="{{ asset('images/atlas.png') }}" class="atlas-logo">
    <p class="atlas-sub">Social Network Service</p>
  </div>

  <div class="login-box">

    <p class="login-title">新規ユーザー登録</p>

    <form method="POST" action="/register">
      @csrf

      <!-- ユーザー名 -->
      <div class="form-group">
        <label>ユーザー名</label>
        <input class="login-input" type="text" name="username" value="{{ old('username') }}">
        @error('username')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <!-- メールアドレス -->
      <div class="form-group">
        <label>メールアドレス</label>
        <input class="login-input" type="email" name="email" value="{{ old('email') }}">
        @error('email')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <!-- パスワード -->
      <div class="form-group">
        <label>パスワード</label>
        <input class="login-input" type="password" name="password">
        @error('password')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <!-- パスワード確認 -->
      <div class="form-group">
        <label>パスワード確認</label>
        <input class="login-input" type="password" name="password_confirmation">
        @error('password_confirmation')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <button class="login-btn" type="submit">
        新規登録
      </button>

    </form>

    <a class="register-link" href="/login">
      ログイン画面へ戻る
    </a>

  </div>

</div>

@endsection
