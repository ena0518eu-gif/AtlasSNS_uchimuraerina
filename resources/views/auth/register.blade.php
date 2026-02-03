@extends('layouts.logout')

@section('content')

<!-- 画面中央制御ラッパー -->
<div class="login-wrapper">

  <!-- ロゴエリア -->
  <div class="login-logo">
    <img src="{{ asset('images/atlas.png') }}" class="atlas-logo">
    <p class="atlas-sub">Social Network Service</p>
  </div>

  <!-- 登録カード -->
  <div class="login-box">

    <p class="login-title">新規ユーザー登録</p>

    <form method="POST" action="/register">
      @csrf

      <div class="form-group">
        <label>ユーザー名</label>
        <input class="login-input" type="text" name="username">
      </div>

      <div class="form-group">
        <label>メールアドレス</label>
        <input class="login-input" type="email" name="email">
      </div>

      <div class="form-group">
        <label>パスワード</label>
        <input class="login-input" type="password" name="password">
      </div>

      <div class="form-group">
        <label>パスワード確認</label>
        <input class="login-input" type="password" name="password_confirmation">
      </div>

      <button class="login-btn" type="submit">
        登録
      </button>

    </form>

    <a class="register-link" href="/login">
      ログイン画面へ戻る
    </a>

  </div>

</div>

@endsection
