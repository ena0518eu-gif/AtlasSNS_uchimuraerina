@extends('layouts.logout')

@section('content')

<div class="login-wrapper">

  <!-- ロゴエリア -->
  <div class="login-logo">
    <img src="{{ asset('images/atlas.png') }}" class="atlas-logo">
    <p class="atlas-sub">Social Network Service</p>
  </div>

  <!-- ログインボックス -->
  <div class="login-box">

    <p class="login-title">AtlasSNSへようこそ</p>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group">
        <label>メールアドレス</label>
        <input class="login-input" type="email" name="email">
      </div>

      <div class="form-group">
        <label>パスワード</label>
        <input class="login-input" type="password" name="password">
      </div>

      <button class="login-btn" type="submit">
        ログイン
      </button>

    </form>

    <a class="register-link" href="/register">
      新規ユーザーの方はこちら
    </a>

  </div>

</div>

@endsection
