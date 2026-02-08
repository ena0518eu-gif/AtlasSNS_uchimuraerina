  <!-- サイドバー中身 -->
<div id="confirm">

  <!-- フォロー数 -->
  <div class="follow-block">
    <div class="follow-row">
      <p>フォロー数</p>
      <p>{{ Auth::user()->follows()->count() }}人</p>
    </div>

    <a href="{{ route('follow.list') }}" class="list-btn">
      フォローリスト
    </a>
  </div>

  <div class="under-line"></div>

  <!-- フォロワー数 -->
  <div class="follow-block">
    <div class="follow-row">
      <p>フォロワー数</p>
      <p>{{ Auth::user()->followers()->count() }}人</p>
    </div>

    <a href="{{ route('follower.list') }}" class="list-btn">
      フォロワーリスト
    </a>
  </div>

  <div class="under-line"></div>

  <!-- ユーザー検索 -->
  <div class="follow-block">
    <a href="{{ route('search') }}" class="list-btn">
      ユーザー検索
    </a>
  </div>

</div>
