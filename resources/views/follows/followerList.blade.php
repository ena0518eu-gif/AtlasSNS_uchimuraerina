@extends('layouts.app')

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/follow-list.css') }}">
@endsection

  <!-- フォロワー一覧 -->

<h2 class="follow-title">フォロワーリスト</h2>

  <!-- フォロワーアイコン一覧（上部） -->
<div class="follow-icon-area">
  @foreach($followersPosts as $follower)
    <!-- ユーザーアイコン（プロフィールリンク） -->
    <a href="{{ url('/profile/' . $follower->id) }}">
      <img
        src="{{ $follower->icon_path
          ? asset('storage/' . $follower->icon_path)
          : asset('images/icon1.png') }}"
        class="follow-icon"
      >
    </a>
  @endforeach
</div>

  <!-- 投稿一覧 -->
<div class="post-list-wrapper">
  @foreach($followersPosts as $follower)
    @foreach($follower->posts as $post)
      <!-- 投稿1件 -->
      <div class="post-item">
        <!-- ユーザーアイコン -->
        <div class="post-user-icon">
          <a href="{{ url('/profile/' . $follower->id) }}">
            <img
              src="{{ $follower->icon_path
                ? asset('storage/' . $follower->icon_path)
                : asset('images/icon1.png') }}"
            >
          </a>
        </div>

        <!-- 投稿内容 -->
        <div class="post-content">
          <!-- ユーザー名 -->
          <p class="post-username">
            {{ $follower->username }}
          </p>
          <!-- 投稿本文 -->
          <p class="post-text">
            {{ $post->post }}
          </p>
        </div>

        <!-- 投稿日時 -->
        <div class="post-right">
          <span class="post-date">
            {{ $post->created_at->format('Y-m-d H:i') }}
          </span>
        </div>
      </div>
    @endforeach
  @endforeach
</div>

@endsection
