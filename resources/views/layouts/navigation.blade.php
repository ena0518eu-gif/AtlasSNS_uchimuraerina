<!-- <header id="head">

  <div id="menu-area"> -->

    <!-- =========================
      左側：Atlasロゴエリア
    ========================= -->

    <!-- <div class="header-left"> -->
      <!-- <a href="{{ url('/top') }}">
        <img src="{{ asset('images/atlas.png') }}" id="atlas-logo">
      </a>
    </div> -->

    <!-- =========================
      右側：ユーザーメニューエリア
    ========================= -->

    <!-- <div class="header-right"> -->

      <!-- ログイン時のみ表示 -->
      <!-- @if(Auth::check()) -->

        <!-- ユーザー名表示 -->
        <!-- <span id="user-name"> -->
          <!-- {{ Auth::user()->username }} さん -->
        <!-- </span> -->

        <!-- アコーディオン矢印ボタン -->
        <!-- <div class="menu-btn">
          <img src="{{ asset('images/arrow.png') }}" id="accordion-btn">
        </div> -->

        <!-- ユーザーアイコン -->
        <!-- <img
          src="{{ Auth::user()->icon_image ? asset(Auth::user()->icon_image) : asset('images/icon1.png') }}"
          id="header-user-icon" -->
        >

        <!-- =========================
          アコーディオンメニュー
        ========================= -->

        <!-- <ul id="accordion-menu">
 -->
          <!-- HOME -->
          <!-- <li>
            <a href="{{ url('/top') }}">HOME</a>
          </li>
 -->
          <!-- プロフィール編集 -->
          <!-- <li>
            <a href="{{ url('/profile') }}">プロフィール編集</a>
          </li> -->

          <!-- ログアウト（POST送信） -->
          <!-- <li>
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

</header> -->
