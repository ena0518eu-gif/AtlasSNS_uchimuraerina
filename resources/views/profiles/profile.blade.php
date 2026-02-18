@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')

<!-- プロフィール編集 -->
<div class="profile-area">
  <div class="profile-card">

    <!-- プロフィール全体（横並び） -->
    <div class="profile-wrapper">

      <!-- 左：ユーザーアイコン -->
      <div class="profile-icon-area">
        <img src="{{ $user->icon_image ? asset('storage/' . $user->icon_image) : asset('images/icon1.png') }}">
      </div>

      <!-- 右：フォーム -->
      <div class="profile-form-area">
        <form action="{{ route('profile.update') }}"
              method="POST"
              enctype="multipart/form-data">
          @csrf

          <!-- ユーザー名 -->
          <div class="form-group">
            <label>ユーザー名</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}">
            @error('username')
              <p class="error-message">{{ $message }}</p>
            @enderror
          </div>

          <!-- メールアドレス -->
          <div class="form-group">
            <label>メールアドレス</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}">
            @error('email')
              <p class="error-message">{{ $message }}</p>
            @enderror
          </div>

          <!-- パスワード -->
          <div class="form-group">
            <label>パスワード</label>
            <input type="password" name="new_password">
            @error('new_password')
              <p class="error-message">{{ $message }}</p>
            @enderror
          </div>

          <!-- パスワード確認 -->
          <div class="form-group">
            <label>パスワード確認</label>
            <input type="password" name="new_password_confirmation">
            @error('new_password_confirmation')
              <p class="error-message">{{ $message }}</p>
            @enderror
          </div>

          <!-- 自己紹介 -->
          <div class="form-group textarea-group">
            <label>自己紹介</label>
            <textarea name="bio">{{ old('bio', $user->bio) }}</textarea>
            @error('bio')
              <p class="error-message">{{ $message }}</p>
            @enderror
          </div>

          <!-- アイコン画像 -->
          <div class="form-group">
            <label>アイコン画像</label>

            <div class="file-box">
              <input
                type="file"
                name="icon_image"
                accept=".jpg,.jpeg,.png,.bmp,.gif,.svg"
                class="file-input"
              >
              <span class="file-text">ファイルを選択</span>
            </div>

            @error('icon_image')
              <p class="error-message">{{ $message }}</p>
            @enderror

          </div>

          <!-- 更新ボタン -->
          <div class="form-btn">
            <button type="submit" class="update-btn">更新</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>

@endsection
