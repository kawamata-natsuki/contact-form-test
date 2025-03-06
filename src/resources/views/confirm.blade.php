<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
</head>

<body>

  <h1>confirm.blade.php</h1>
  <h2>お問い合わせ入力確認画面</h2>

  <form action="/contact" method="post">
    @csrf
    <input type="text" value="{{$contact['name']}}">
    <button type="submit">送信</button>
  </form>

  <form action="/" method="post">
    @csrf
    <button type="submit">修正</button>
  </form>


</body>

</html>