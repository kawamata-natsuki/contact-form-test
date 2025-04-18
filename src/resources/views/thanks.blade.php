<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>

  <!-- フォントの読み込み -->
  <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/sanitize.css')}}">
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">

</head>

<body>
  <main>

    <div class="thanks__container">
      <div class="thanks__message">
        <p>お問い合わせありがとうございました</p>
      </div>
      <div class="home__button">
        <form action="{{ route('contact.create') }}" method="get">
          <button class="home__button-subimit" type="submit">HOME</button>
        </form>
      </div>
    </div>

  </main>
</body>

</html>