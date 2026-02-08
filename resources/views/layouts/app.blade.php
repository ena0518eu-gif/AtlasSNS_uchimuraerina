<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>AtlasSNS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  @yield('css')

</head>

<body class="{{ request()->routeIs('profile.edit') ? 'profile-page' : '' }}">

  <!-- ヘッダー -->

<header id="head">
  <div id="menu-area">

    <!-- 左ロゴ -->
    <div class="header-left">
      <img src="{{ asset('images/atlas.png') }}" id="atlas-logo">
    </div>

    <!-- 右メニュー -->
    <div class="header-right">

      <!-- ユーザー名 -->
      <span id="user-name">
        {{ Auth::user()->username }} さん
      </span>

      <!-- 矢印ボタン -->
      <div id="accordion-btn"></div>

      <!-- ユーザーアイコン -->
      <div class="header-user-icon">
        <img src="{{ Auth::user()->icon_path ? asset(Auth::user()->icon_path) : asset('images/icon1.png') }}">
      </div>

      <!-- ドロップダウンメニュー -->
      <ul id="accordion-menu">

        <li>
          <a href="/top">HOME</a>
        </li>

        <li>
          <a href="{{ route('profile.edit') }}">
            プロフィール編集
          </a>
        </li>

        <li>
          <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="logout-btn">
              ログアウト
            </button>
          </form>
        </li>

      </ul>

    </div>

  </div>
</header>

  <!-- メインレイアウト -->

<div class="top-wrapper">

  <!-- 左メインエリア -->
  <main class="main-area">
    @yield('content')
  </main>

  <!-- 右サイドバー -->
  <aside class="side-bar">

    <div id="confirm">

      <p>{{ Auth::user()->username }}さんの情報</p>

      <!-- フォロー -->
      <div class="follow-block">
        <div class="follow-row">
          <span>フォロー数</span>
          <span>{{ Auth::user()->follows()->count() }}人</span>
        </div>
        <a href="/follow-list" class="list-btn">フォローリスト</a>
      </div>

      <!-- フォロワー -->
      <div class="follow-block">
        <div class="follow-row">
          <span>フォロワー数</span>
          <span>{{ Auth::user()->followers()->count() }}人</span>
        </div>
        <a href="/follower-list" class="list-btn">フォロワーリスト</a>
      </div>

      <div class="under-line"></div>

      <div class="btn">
        <a href="/search">ユーザー検索</a>
      </div>

    </div>

  </aside>

</div>

  <!-- JS読み込み -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
