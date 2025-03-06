<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <header>
    <a href="/register">register</a>
  </header>

  <h1>login.blade.php</h1>
  <h2>ログインページ</h2>

  <form action="/login" method="post">
    @csrf
    <p>メールアドレス</p>
    <input type="email" name="email" value="{{ old('email') }}">
    <p>パスワード</p>
    <input type="text" name="password" value="{{ old('password') }}">

    <button type="submit">ログイン</button>
  </form>


</body>

</html>