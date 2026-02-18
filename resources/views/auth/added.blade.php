@extends('layouts.logout')

@section('content')

<div class="login-wrapper">

  <!-- ロゴ -->
  <div class="login-logo">
    <img src="{{ asset('images/atlas.png') }}" class="atlas-logo">
    <p class="atlas-sub">Social Network Service</p>
  </div>

  <!-- 登録完了カード -->
  <div class="added-container">

    <!-- ユーザー名 -->
    <p class="added-username">
      {{ session('username') }}さん
    </p>

    <!-- ようこそメッセージ -->
    <p class="added-welcome">
      ようこそ！AtlasSNSへ
    </p>

    <!-- メッセージ -->
    <p class="added-message">
      ユーザー登録が完了いたしました。<br>
      早速ログインをしてみましょう！
    </p>

    <!-- ログインボタン -->
    <a href="{{ route('login') }}" class="added-btn">
      ログイン画面へ
    </a>

  </div>

</div>

@endsection
