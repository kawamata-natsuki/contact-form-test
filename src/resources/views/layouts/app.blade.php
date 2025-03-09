<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('sanitize.css')}}">
  <link rel="stylesheet" href="{{ asset('common.css')}}">
  @yield('css')

</head>

<body>

  <header>
    <div class="header__inner">

      <div class="header__logo">
        <h1>FashionablyLate</h1>
      </div>
      <div class="header-nav">
        <div class="header-nav__item">
          @yield('link')
        </div>
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