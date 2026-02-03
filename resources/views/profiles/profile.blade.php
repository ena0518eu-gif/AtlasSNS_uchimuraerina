<x-login-layout>

<div class="profile-wrap">

  <!-- 現在のログインユーザーアイコン -->
  <div class="profile-icon">
    <img src="{{ asset(Auth::user()->icon_path) }}">
  </div>

  <!-- エラーメッセージ表示 -->
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <p style="color:red">{{ $error }}</p>
    @endforeach
  @endif

  <!-- プロフィール編集フォーム -->
  <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- ユーザー名 -->
    <div class="form-group">
      <label>ユーザー名</label>
      <input type="text" name="username" value="{{ Auth::user()->username }}">
    </div>

    <!-- メールアドレス -->
    <div class="form-group">
      <label>メールアドレス</label>
      <input type="email" name="email" value="{{ Auth::user()->email }}">
    </div>

    <!-- パスワード -->
    <div class="form-group">
      <label>パスワード</label>
      <input type="password" name="password">
    </div>

    <!-- パスワード確認 -->
    <div class="form-group">
      <label>パスワード確認</label>
      <input type="password" name="password_confirmation">
    </div>

    <!-- 自己紹介 -->
    <div class="form-group">
      <label>自己紹介</label>
      <textarea name="bio">{{ Auth::user()->bio }}</textarea>
    </div>

    <!-- アイコン画像 -->
    <div class="form-group">
      <label>アイコン画像</label>
      <input type="file" name="icon">
    </div>

    <!-- 更新ボタン -->
    <button type="submit">更新</button>

  </form>

</div>

</x-login-layout>
