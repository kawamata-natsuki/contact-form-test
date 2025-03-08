<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
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

</body>

</html>