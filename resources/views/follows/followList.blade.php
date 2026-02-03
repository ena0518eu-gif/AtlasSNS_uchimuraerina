@extends('layouts.app')

@section('content')

<h2>フォローしているユーザーの投稿一覧</h2>

<!-- フォローアイコン一覧 -->
<div class="follow-icon-area">
  @foreach($followedUsersPosts as $followedUser)
    <a href="{{ url('/profile/' . $followedUser->id) }}">
      <img src="{{ asset('images/' . $followedUser->icon_image) }}" class="follow-icon">
    </a>
  @endforeach
</div>

@foreach($followedUsersPosts as $followedUser)
  @foreach($followedUser->posts as $post)

  <!-- 投稿1件 -->
  <div class="post-item">

    <!-- ユーザーアイコン -->
    <div class="post-user-icon">
      <a href="{{ url('/profile/' . $followedUser->id) }}">
        <img src="{{ asset('images/' . $followedUser->icon_image) }}">
      </a>
    </div>

    <!-- 投稿内容 -->
    <div class="post-content">
      <p class="post-username">{{ $followedUser->username }}</p>
      <p class="post-text">{{ $post->content }}</p>
    </div>

    <!-- 右側（日付） -->
    <div class="post-right">
      <div class="post-date">
        {{ $post->created_at->format('Y-m-d H:i') }}
      </div>
    </div>

  </div>

  @endforeach
@endforeach

@endsection
