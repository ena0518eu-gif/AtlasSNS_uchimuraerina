<header id="head">

  <div id="menu-area">

      <!-- 左側：Atlasロゴエリア -->

    <div class="header-left">
      <a href="{{ url('/top') }}">
        <img src="{{ asset('images/atlas.png') }}" id="atlas-logo">
      </a>
    </div>

      <!-- 右側：ユーザーメニューエリア -->

    <div class="header-right">

      @if(Auth::check())

        <span id="user-name">
          {{ Auth::user()->username }} さん
        </span>

        <div class="menu-btn">
          <img src="{{ asset('images/arrow.png') }}" id="accordion-btn">
        </div>



<img src="{{ Auth::user()->icon_image ? asset('storage/'.Auth::user()->icon_image) : asset('storage/icon1.png') }}">

<ul id="accordion-menu">

          <li>
            <a href="{{ url('/top') }}">HOME</a>
          </li>

          <li>
            <a href="{{ url('/profile') }}">プロフィール編集</a>
          </li>

          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="logout-btn">
                ログアウト
              </button>
            </form>
          </li>

        </ul>

      @endif

    </div>

  </div>

</header>
