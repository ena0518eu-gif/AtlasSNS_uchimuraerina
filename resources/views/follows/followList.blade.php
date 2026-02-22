@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/follow-list.css') }}">
@endsection

@section('content')

  <!-- フォロー一覧 -->

<div class="follow-header">
  <h2 class="follow-title">フォローリスト</h2>

  <!-- フォローアイコン一覧（横並び） -->
  <div class="follow-icon-area">
    @foreach($follows as $follow)
      <a href="{{ route('profile.show', $follow->id) }}">
        <img
          src="{{
            $follow->icon_image
              ? asset('images/icons/' . $follow->icon_image) {{-- ストレージ内の画像を参照 --}}
              : asset('images/icons/icon1.png')               {{-- デフォルトのアイコン --}}
          }}"
          class="follow-icon"
        >
      </a>
    @endforeach
  </div>
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
            src="{{
              $post->user->icon_image
                ? (str_contains($post->user->icon_image, 'icons/')
                    ? asset('images/icons/' . $post->user->icon_image) {{-- こちらも storage 内の画像を参照 --}}
                    : asset('images/icons/' . $post->user->icon_image))
                : asset('images/icons/icon1.png')               {{-- デフォルトアイコン --}}
            }}"
            class="post-icon-img"
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
