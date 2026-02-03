<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>AtlasSNS</title>

  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/logout.css') }}">
</head>

<body class="auth-body">

  <!-- 画面中央制御 -->
  <div class="auth-wrapper">

    @yield('content')

  </div>

</body>
</html>
