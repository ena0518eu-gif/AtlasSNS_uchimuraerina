<!-- フォロー -->
<div class="follow-block">
<div class="follow-row">
  <span>フォロー数</span>
  <span>{{ Auth::user()->follows()->count() }}人</span>
</div>

  <div class="under-line"></div>

  <a href="/follow-list" class="list-btn">フォローリスト</a>
</div>

<!-- フォロワー -->
<div class="follow-block">
<div class="follow-row">
  <span>フォロワー数</span>
  <span>{{ Auth::user()->followers()->count() }}人</span>
</div>

  <div class="under-line"></div>

  <a href="/follower-list" class="list-btn">フォロワーリスト</a>
</div>
