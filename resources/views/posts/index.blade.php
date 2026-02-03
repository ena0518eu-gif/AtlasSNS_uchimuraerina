@extends('layouts.app')

@section('content')


@foreach($posts as $post)

<div class="post-item">

  <div class="post-user-icon">
    <img src="{{ $post->user->icon_path ? asset($post->user->icon_path) : asset('images/icon1.png') }}">
  </div>

  <div class="post-content">
    <p class="post-username">{{ $post->user->username }}</p>
    <p class="post-text">{{ $post->post }}</p>
  </div>

  <div class="post-right">

    <div class="post-date">
      {{ $post->created_at }}
    </div>

    @if(Auth::id() === $post->user_id)

    <div class="post-action">

      <!-- 編集 -->
      <button class="edit-btn js-modal-open"
        data-id="{{ $post->id }}"
        data-post="{{ $post->post }}">
        <img src="{{ asset('images/edit.png') }}" class="edit-icon normal">
        <img src="{{ asset('images/edit_h.png') }}" class="edit-icon hover">
      </button>

      <!-- 削除 -->
      <button
        type="button"
        class="delete-btn js-delete-open"
        data-id="{{ $post->id }}">

        <img src="{{ asset('images/trash.png') }}" class="delete-icon normal">
        <img src="{{ asset('images/trash-h.png') }}" class="delete-icon hover">

      </button>

    </div>

    @endif

  </div>

</div>

@endforeach
@endsection
