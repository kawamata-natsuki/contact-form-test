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

      <!-- -- 管理画面にはlogout　登録ページにはregister　ログインページにはlogin のリンクが出るようにする @auth @else 
      <ul class="header-nav">
        <li class="header-nav__item">
          <a.header-nav__link href="">ページ遷移のリンク</a>
        </li>
        <li class="header-nav__item">
          @if (Auth::check())
          <form action="/logout" method="post">
            @csrf
            <button>logout</button>
          </form>
          @endif
        </li>
      </ul>
      -->
    </div>
  </header>

  <main>
    @yield('content')
  </main>

</body>

</html>