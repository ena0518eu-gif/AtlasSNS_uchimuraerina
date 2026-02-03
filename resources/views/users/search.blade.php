@extends('layouts.app')

@section('content')

<div class="search-form">
  <form action="{{ url('search') }}" method="GET">

    <!-- 検索ワード入力 -->
    <input
      type="text"
      name="keyword"
      placeholder="ユーザー名を検索"
      value="{{ request('keyword') }}"
    >

    <!-- 検索ボタン（画像） -->
    <button type="submit" class="search-btn">
      <img src="{{ asset('images/search.png') }}" alt="検索">
    </button>

  </form>
</div>

{{-- 検索ワード表示 --}}
<h3>検索ワード: {{ $keyword ?? '' }}</h3>

{{-- 検索結果一覧 --}}
<div class="search-result">

@if(isset($users) && $users->count() > 0)

  @foreach($users as $user)

  <div class="user-item">

    {{-- ユーザー情報 --}}
    <div class="user-info">
      <img src="{{ asset('images/' . $user->icon_image) }}" width="40">
      <span>{{ $user->username }}</span>
    </div>

    {{-- フォローボタンエリア --}}
    <div class="follow-btn-area">

      {{-- フォロー済みの場合 --}}
      @if(isset($followedUserIds) && in_array($user->id, $followedUserIds))

        <!-- フォロー解除ボタン -->
        <form action="{{ route('follow.destroy', $user->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button class="unfollow-btn">フォロー解除</button>
        </form>

      {{-- 未フォローの場合 --}}
      @else

        <!-- フォローボタン -->
        <form action="{{ route('follow.store', $user->id) }}" method="POST">
          @csrf
          <button class="follow-btn">フォローする</button>
        </form>

      @endif

    </div>

  </div>

  @endforeach

@else

  {{-- 検索結果なし --}}
  <p>検索結果がありません。</p>

@endif

</div>

@endsection
