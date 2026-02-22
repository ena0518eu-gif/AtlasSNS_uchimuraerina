@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/top.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection

@section('content')

  <!-- 投稿エリア（TOPページ） -->
<div class="post-area">

    <!-- 投稿フォーム -->
  <div class="post-input-wrapper">

    <div class="post-input-area">

      <!-- ログインユーザーアイコン -->
      <div class="post-user-icon login-user-icon" >
        <img src="
        {{
          Auth::user()->icon_image
            ? asset('images/icons/' . Auth::user()->icon_image)  {{-- icons フォルダに統一 --}}
            : asset('images/icons/icon1.png')                    {{-- デフォルトも icons --}}
        }}">
      </div>

      <!-- 投稿フォーム -->
      <form action="/posts" method="POST" class="post-form-inner">
        @csrf

        <div style="flex:1;">

          <textarea
            name="post"
            rows="1"
            placeholder="投稿内容を入力してください"
          >{{ old('post') }}</textarea>

          {{-- エラーメッセージ --}}
          @if ($errors->has('post'))
            <p class="error-message">
              {{ $errors->first('post') }}
            </p>
          @endif

        </div>

        <button type="submit" class="post-submit">
          <img src="{{ asset('images/post.png') }}">
        </button>

      </form>

    </div>

  </div>

    <!-- 投稿一覧 -->
  <div class="post-list-wrapper">

    @foreach($posts as $post)

      <!-- 1投稿 -->
    <div class="post-item">

      <!-- 投稿ユーザーアイコン -->
      <div class="post-user-icon">
        <img src="
        {{
          $post->user->icon_image
            ? asset('images/icons/' . $post->user->icon_image)
            : asset('images/icons/icon1.png')
        }}">
      </div>

      <div class="post-content">

        <!-- 中央：本文エリア -->
        <div class="post-main">

          <!-- 1行目：名前＋日付 -->
          <div class="post-header">
            <p class="post-username">{{ $post->user->username }}</p>
            <div class="post-date">
              {{ $post->created_at }}
            </div>
          </div>

          <!-- 2行目：投稿内容 -->
          <p class="post-text">{{ $post->post }}</p>

          <!-- 3行目：編集削除ボタン -->
          @if(Auth::id() === $post->user_id)
          <div class="post-action">

            <button
              type="button"
              class="edit-btn js-edit-open"
              data-id="{{ $post->id }}"
              data-post="{{ e(str_replace(["\r\n", "\r", "\n"], '', $post->post)) }}"
            >
              <img src="{{ asset('images/edit.png') }}" class="edit-icon normal">
              <img src="{{ asset('images/edit_h.png') }}" class="edit-icon hover">
            </button>

            <button
              type="button"
              class="delete-btn js-delete-open"
              data-id="{{ $post->id }}"
            >
              <img src="{{ asset('images/trash.png') }}" class="delete-icon normal">
              <img src="{{ asset('images/trash-h.png') }}" class="delete-icon hover">
            </button>

          </div>
          @endif

        </div>

      </div>

    </div>

    @endforeach

  </div>

</div>

{{-- 編集モーダル --}}
<div id="edit-modal" class="modal-overlay">

  <div class="modal-content">

    <div class="js-modal-close" style="display:none;"></div>

    <form id="edit-form" method="POST">
      @csrf
      @method('PUT')

      <textarea id="edit-post" name="post" ></textarea>

      <p class="edit-error"></p>

      <div class="modal-icon-submit">
        <button type="submit" class="modal-submit-btn">
          <img src="{{ asset('images/edit.png') }}">
        </button>
      </div>

    </form>

  </div>

</div>

{{-- 削除モーダル --}}
<div id="delete-modal" class="modal-overlay">

  <div class="modal-content">

    <div class="js-modal-close" style="display:none;"></div>

    <form id="delete-form" method="POST">
      @csrf
      @method('DELETE')

      <p>この投稿を削除しますか？</p>

      <div class="modal-buttons">
        <button type="submit">削除</button>
        <button type="button" class="js-modal-close">キャンセル</button>
      </div>

    </form>

  </div>

</div>

@endsection
