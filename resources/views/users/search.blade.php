@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endsection

@section('content')

  <!-- 検索ページ 全体ラッパー -->
  <div class="search-wrapper">

    <!-- 検索フォーム（左寄せ） -->
    <div class="search-form">
      <form action="{{ url('search') }}" method="GET">

        <!-- 検索ワード入力 -->
        <input
          type="text"
          name="keyword"
          placeholder="ユーザー名"
        >

        <!-- 検索ボタン（画像） -->
        <button type="submit" class="search-btn">
          <img src="{{ asset('images/search.png') }}" alt="検索">
        </button>

        {{-- 🔽 検索ワード表示（検索ボタン右横） --}}
        @if(request('keyword'))
          <span class="search-word">
            検索ワード：{{ request('keyword') }}
          </span>
        @endif

      </form>
    </div>

    <!-- 区切り線 -->
    <div class="search-line"></div>

    <!-- {{-- 検索ワード表示 --}}
    <h3>検索ワード: {{ $keyword ?? '' }}</h3> -->

    {{-- 検索結果一覧（中央寄せ） --}}
    <div class="search-result">

    @if(isset($users) && $users->count() > 0)

      @foreach($users as $user)

      <div class="user-item">

        {{-- ユーザー情報 --}}
        <div class="user-info">
          <img
            src="{{ $user->icon_image
              ? asset('storage/' . $user->icon_image)
              : asset('images/icon1.png') }}"
          >
          <span>{{ $user->username }}</span>
        </div>

        {{-- フォローボタンエリア --}}
        <div class="follow-btn-area">

          @if(isset($followedUserIds) && in_array($user->id, $followedUserIds))

            <form action="{{ route('follow.destroy', $user->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="unfollow-btn">フォロー解除</button>
            </form>

          @else

            <form action="{{ route('follow.store', $user->id) }}" method="POST">
              @csrf
              <button class="follow-btn">フォローする</button>
            </form>

          @endif

        </div>

      </div>

      @endforeach

    @else

      <p>検索結果がありません。</p>

    @endif

    </div>

  </div>

@endsection
