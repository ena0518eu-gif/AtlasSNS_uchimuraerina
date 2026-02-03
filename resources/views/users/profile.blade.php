@extends('layouts.login')

@section('content')

<div class="profile-wrap">
  <!-- アイコン -->
  <div class="profile-icon">
    <img src="{{ asset($user->icon_path) }}">
  </div>

  <!-- ユーザー名 -->
  <div class="profile-name">
    {{ $user->username }}
  </div>

  <!-- 自己紹介 -->
  <div class="profile-bio">
    {{ $user->bio }}
  </div>

  <!-- フォロー数、フォロワー数 -->
  <div class="follow-info">
    <p>フォロー数: {{ count($user->follows) }} 人</p>
    <p>フォロワー数: {{ count($user->followers) }} 人</p>
  </div>

  <!-- 投稿一覧 -->
  <div class="posts-list">
    <h3>投稿一覧</h3>
    @foreach ($user->posts as $post)
      <div class="post-item">
        <!-- ユーザーアイコン -->
        <div class="post-user-icon">
          <img src="{{ asset($user->icon_path) }}">
        </div>
        <!-- ユーザー名 -->
        <div class="post-content">
          <p class="user-name">{{ $user->username }}</p>
          <!-- 投稿内容 -->
          <p>{{ $post->post }}</p>
        </div>
        <!-- 投稿日時 -->
        <div class="post-date">
          {{ $post->created_at }}
        </div>
      </div>
    @endforeach
  </div>

  <!-- フォローボタン -->
  <div class="follow-button">
    @if($isFollowed)
      <form action="/unfollow/{{$user->id}}" method="POST">
        @csrf
        @method('DELETE') <!-- ここでDELETEメソッドを追加 -->
        <button type="submit">フォロー解除</button>
      </form>
    @else
      <form action="/follow/{{$user->id}}" method="POST">
        @csrf
        <button type="submit">フォローする</button>
      </form>
    @endif
  </div>

</div>

@endsection
