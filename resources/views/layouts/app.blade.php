<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>AtlasSNS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- =========================
    共通CSS
  ========================= -->

  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>


<!-- =========================
  ヘッダー
========================= -->

<header id="head">
  <div id="menu-area">

    <!-- =========================
      左ロゴ
    ========================= -->

    <div class="header-left">
      <img src="{{ asset('images/atlas.png') }}" id="atlas-logo">
    </div>

    <!-- =========================
      右メニュー
    ========================= -->

    <div class="header-right">

      <!-- ユーザー名 -->
      <span id="user-name">
        {{ Auth::user()->username }} さん
      </span>

      <!-- =========================
        矢印ボタン（画像）
      ========================= -->

      <div id="accordion-btn" class="menu-btn">
      </div>

      <!-- =========================
        ユーザーアイコン
      ========================= -->


<img src="{{ asset(Auth::user()->icon_path) }}" id="header-user-icon">

      <!-- =========================
        アコーディオンメニュー
      ========================= -->

      <ul id="accordion-menu">

        <li>
<a href="{{ route('profile.edit') }}">
  プロフィール編集
</a>
        </li>

        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
              ログアウト
            </button>
          </form>
        </li>

      </ul>

    </div>

  </div>
</header>

<!-- =========================
  メインレイアウト
========================= -->

<div id="row">

  <!-- =========================
    メインコンテンツ
  ========================= -->

  <div id="container">
    @yield('content')
  </div>

  <!-- =========================
    サイドバー
  ========================= -->

  <div id="side-bar">

    <div id="confirm">

      <p>{{ Auth::user()->username }}さんの情報</p>

      <div>
        <span>フォロー数</span>
        <span>{{ Auth::user()->follows()->count() }}</span>
      </div>

      <div>
        <span>フォロワー数</span>
        <span>{{ Auth::user()->followers()->count() }}</span>
      </div>

      <div class="btn">
        <a href="/search">
          ユーザー検索
        </a>
      </div>

    </div>

  </div>

</div>

<!-- =========================
  JS読み込み
========================= -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- 共通JS -->
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
