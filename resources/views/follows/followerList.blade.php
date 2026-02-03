@extends('layouts.app')

@section('content')

<h2>フォロワーリスト</h2>
            <div class="follower-item">

<div class="follower-icon-area">
    @foreach($followersPosts as $follower)
        @foreach($follower->posts as $post)
                <!-- ユーザーアイコン (リンク付き) -->
                <a href="{{ url('/profile/' . $follower->id) }}">
                    <img src="{{ asset('images/' . $follower->icon_image) }}" class="follow-icon">
                </a>

                <!-- ユーザー名 -->
                <div class="follower-username">
                    <strong>{{ $follower->username }}</strong>
                </div>

                <!-- 投稿内容 -->
                <div class="post-content">
                    <p>{{ $post->content }}</p>
                </div>

                <!-- 投稿日時 -->
                <div class="post-time">
                    <p>{{ $post->created_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>
        @endforeach
    @endforeach
</div>

@endsection
