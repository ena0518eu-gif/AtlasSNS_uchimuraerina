<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>AtlasSNS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  @yield('css')
</head>

<body class="{{ request()->routeIs('profile.edit') ? 'profile-page' : '' }}">

  <!-- ヘッダー -->
<header id="head">

  <div id="menu-area">

      <!-- 左側：Atlasロゴ -->
    <div class="header-left">
      <a href="{{ url('/top') }}">
        <img src="{{ asset('images/atlas.png') }}" alt="Atlas">
      </a>
    </div>

      <!-- 右側：ユーザーメニュー -->
    <div class="header-right">

      @if(Auth::check())

<!-- ユーザー名 -->
<span class="user-name-text">
  {{ Auth::user()->username }}
</span>

<span class="user-honor">
  さん
</span>

        <!-- 矢印 -->
        <div id="accordion-btn"></div>

        <!-- ヘッダーアイコン -->
        <div class="header-icon">
          <img src="
          {{
            Auth::user()->icon_image
              ? asset('images/icons/' . Auth::user()->icon_image) {{-- icons フォルダに統一 --}}
              : asset('images/icons/icon1.png')                   {{-- デフォルトも icons --}}
          }}">
        </div>

          <!-- ドロップダウンメニュー -->
        <ul id="accordion-menu">

          <li>
            <a href="{{ url('/top') }}"
               class="{{ request()->is('top') ? 'active' : '' }}">
              HOME
            </a>
          </li>

          <li>
            <a href="{{ route('profile.edit') }}"
               class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">
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

      @endif

    </div>

  </div>

</header>

  <!-- メインレイアウト -->
<div class="top-wrapper">

    <!-- 左：メイン -->
  <main class="main-area">
    @yield('content')
  </main>

    <!-- 右：サイドバー -->
  <aside class="side-bar">
    {{-- サイドバー --}}
    @include('layouts.sidebar')
  </aside>

</div>

  <!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
