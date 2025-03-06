<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <header>
    <a href="/login">login</a>
  </header>

  <h1>register.blade.php</h1>
  <h2>登録ページ</h2>

  <form action="/register" method="post">
    @csrf
    <p>お名前</p>
    <input type="text" name="name" value="{{ old('name') }}">
    <p>メールアドレス</p>
    <input type="email" name="email" value="{{ old('email') }}">
    <p>パスワード</p>
    <input type="password" name="password" value="{{ old('password') }}">
    @if ($errors->has('password'))
    <p style="color:red;">{{ $errors->first('password') }}</p>
    @endif

    <button type="submit">登録</button>
  </form>


</body>

</html>