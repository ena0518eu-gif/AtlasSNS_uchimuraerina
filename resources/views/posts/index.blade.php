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
      <div class="post-user-icon">
        <img src="{{ Auth::user()->icon_image
          ? asset('storage/' . Auth::user()->icon_image)
          : asset('images/icon1.png') }}">
      </div>

      <!-- 投稿フォーム -->
      <form action="/posts" method="POST" class="post-form-inner">
        @csrf

        <div style="flex:1;">

          <textarea
            name="post"
            maxlength="150"
            placeholder="投稿内容を入力してください。"
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
        <img src="{{ $post->user->icon_image
          ? asset('storage/' . $post->user->icon_image)
          : asset('images/icon1.png') }}">
      </div>

      <!-- 中央：本文エリア -->
      <div class="post-main">
        <p class="post-username">{{ $post->user->username }}</p>
        <p class="post-text">{{ $post->post }}</p>
      </div>

      <!-- 右端：日付＋ボタン -->
      <div class="post-side">

        <div class="post-date">
          {{ $post->created_at }}
        </div>

        @if(Auth::id() === $post->user_id)

        <!-- 編集・削除ボタン -->
        <div class="post-action">

          <!-- 編集ボタン -->
          <button
            type="button"
            class="edit-btn js-edit-open"
            data-id="{{ $post->id }}"
            data-post="{{ e($post->post) }}"
          >
            <img src="{{ asset('images/edit.png') }}" class="edit-icon normal">
            <img src="{{ asset('images/edit_h.png') }}" class="edit-icon hover">
          </button>

          <!-- 削除ボタン -->
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

    @endforeach

  </div>

</div>


  <!-- 編集モーダル -->
<div class="modal-overlay" id="edit-modal">
  <div class="modal-box">
    <form method="POST" id="edit-form">
      @csrf
      @method('PUT')

      <textarea id="edit-post" name="post" maxlength="150"></textarea>

      <div class="modal-btn-area">

        <!--  hover切替 -->
        <button type="submit" class="edit-btn modal-edit-btn">
          <img src="{{ asset('images/edit.png') }}" class="normal">
          <img src="{{ asset('images/edit_h.png') }}" class="hover">
        </button>

      </div>
    </form>
  </div>
</div>


  <!-- 削除モーダル -->
<div class="modal-overlay" id="delete-modal">
  <div class="modal-box">

    <p class="delete-text">
      この投稿を削除します。よろしいでしょうか？
    </p>

    <form method="POST" id="delete-form">
      @csrf
      @method('DELETE')

      <div class="modal-btn-area">
        <button type="submit" class="modal-ok">OK</button>
        <button type="button" class="modal-cancel js-modal-close">キャンセル</button>
      </div>
    </form>

  </div>
</div>

@endsection
