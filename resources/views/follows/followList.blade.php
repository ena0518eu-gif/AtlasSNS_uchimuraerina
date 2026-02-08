@extends('layouts.app')

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/follow-list.css') }}">
@endsection

  <!-- フォロー一覧 -->

<h2 class="follow-title">フォローリスト</h2>

  <!-- フォローアイコン一覧（上部） -->
<div class="follow-icon-area">
  @foreach($posts->unique('user_id') as $post)
    <!-- ユーザーアイコン（プロフィールリンク） -->
    <a href="{{ url('/profile/' . $post->user->id) }}">
      <img
        src="{{ $post->user->icon_path
          ? asset('storage/' . $post->user->icon_path)
          : asset('images/icon1.png') }}"
        class="follow-icon"
      >
    </a>
  @endforeach
</div>

  <!-- 投稿一覧 -->
<div class="post-list-wrapper">
  @foreach($posts as $post)
      <!-- 投稿1件 -->
      <div class="post-item">
        <!-- ユーザーアイコン -->
        <div class="post-user-icon">
          <a href="{{ url('/profile/' . $post->user->id) }}">
            <img
              src="{{ $post->user->icon_path
                ? asset('storage/' . $post->user->icon_path)
                : asset('images/icon1.png') }}"
            >
          </a>
        </div>

        <!-- 投稿内容 -->
        <div class="post-content">
          <!-- ユーザー名 -->
          <p class="post-username">
            {{ $post->user->username }}
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
</div>

@endsection
