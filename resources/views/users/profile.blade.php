@extends('layouts.app')

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/profile-other.css') }}">
@endsection


  <!-- 相手プロフィール全体 -->

<div class="profile-wrap profile-card">

    <!-- 左：ユーザーアイコン -->
  <div class="profile-icon">
    <img src="{{ $user->icon_image ? asset('images/icons/' . $user->icon_image) : asset('images/icons/icon1.png') }}">
  </div>

    <!-- 中央：ユーザー情報 -->
  <div class="profile-info">

    <!-- ユーザー名 -->
    <div class="profile-name">
      <span class="profile-label">ユーザー名</span>
      <span class="profile-value">{{ $user->username }}</span>
    </div>

    <!-- 自己紹介 -->
    <div class="profile-bio">
      <span class="profile-label">自己紹介</span>
      <span class="profile-value">{{ $user->bio }}</span>
    </div>

  </div>

    <!-- 右：フォロー / フォロー解除ボタン -->
  <div class="profile-follow-btn">

    @if($isFollowed)
      <!-- フォロー解除 -->
      <form action="{{ route('follow.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="unfollow-btn">
          フォロー解除
        </button>
      </form>
    @else
      <!-- フォローする -->
      <form action="{{ route('follow.store', $user->id) }}" method="POST">
        @csrf
        <button type="submit" class="follow-btn">
          フォローする
        </button>
      </form>
    @endif

  </div>

</div>


  <!-- 投稿一覧 -->

<div class="post-list-wrapper">

  @foreach ($user->posts as $post)

    <!-- 投稿1件 -->
    <div class="post-item">

      <!-- 投稿者アイコン -->
      <div class="post-user-icon">
        <img src="{{ $user->icon_image ? asset('images/icons/' . $user->icon_image) : asset('images/icons/icon1.png') }}">
      </div>

      <!-- 投稿内容 -->
      <div class="post-content">
        <p class="post-username">{{ $user->username }}</p>
        <p class="post-text">{{ $post->post }}</p>
      </div>

      <!-- 投稿日時 -->
      <div class="post-right">
        <p class="post-date">
          {{ $post->created_at->format('Y-m-d H:i') }}
        </p>
      </div>

    </div>

  @endforeach

</div>

@endsection
