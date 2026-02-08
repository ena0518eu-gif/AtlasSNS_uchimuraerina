<!-- サイドバー中身 -->
<div id="confirm">

  <!-- フォロー数 -->
  <div class="follow-block">
    <div class="follow-row">
      <p>フォロー数</p>
      <p class="count">{{ Auth::user()->follows()->count() }}人</p>
    </div>

    <a href="{{ route('follow.list') }}" class="list-btn right-btn">
      フォローリスト
    </a>
  </div>

  <!-- フォロワー数 -->
  <div class="follow-block">
    <div class="follow-row">
      <p>フォロワー数</p>
      <p class="count">{{ Auth::user()->followers()->count() }}人</p>
    </div>

    <a href="{{ route('follower.list') }}" class="list-btn right-btn">
      フォロワーリスト
    </a>
  </div>

  <div class="under-line"></div>

  <!-- ユーザー検索 -->
  <div class="follow-block">
    <a href="{{ route('search') }}" class="list-btn center-btn">
      ユーザー検索
    </a>
  </div>

</div>
