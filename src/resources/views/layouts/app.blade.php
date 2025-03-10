<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>

  <!-- フォントの読み込み -->
  <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
  <!-- モーダルウィンドウの読み込み -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/sanitize.css')}}">
  <link rel="stylesheet" href="{{ asset('css/common.css')}}">
  @yield('css')

</head>

<body>

  <header>
    <div class="header__inner">
      <div class="header__logo">
        <h1 class="header__logo-title">FashionablyLate</h1>
      </div>
      <div class="header-nav">
        <div class="header-nav__item">
          @yield('link')
        </div>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>