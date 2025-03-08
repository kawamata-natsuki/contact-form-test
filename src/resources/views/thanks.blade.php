<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
  <!--  
  <link rel="stylesheet" href="{{ asset('sanitize.css')}}">
  <link rel="stylesheet" href="{{ asset('common.css')}}">
  <link rel="stylesheet" href="{{ asset('thanks.css') }}">
  -->
</head>

<body>

  <main>

    <div class="thanks__container">
      <div class="thanks__message">
        <h2>お問い合わせありがとうございました</h2>
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