@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/follow-list.css') }}">
@endsection

@section('content')

  <!-- フォロワー一覧 -->

<div class="follow-header">
  <h2 class="follow-title">フォロワーリスト</h2>

  <!-- フォロワーアイコン一覧（横並び） -->
  <div class="follow-icon-area">
    @foreach($followers as $follower)
      <!-- ユーザーアイコン（プロフィールリンク） -->
      <a href="{{ url('/profile/' . $follower->id) }}">
        <img
          src="
          {{
            $follower->icon_image
              ? asset('images/icons/' . $follower->icon_image)  {{-- icons フォルダに統一 --}}
              : asset('images/icons/icon1.png')                {{-- デフォルトも icons --}}
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
              src="
              {{
                $post->user->icon_image
                  ? asset('images/icons/' . $post->user->icon_image)  {{-- icons フォルダに統一 --}}
                  : asset('images/icons/icon1.png')                    {{-- デフォルトも icons --}}
              }}"
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
