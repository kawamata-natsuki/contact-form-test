@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('link')
<div class="header-nav">
  <div class="header-nav__item">
    <a class="header-nav__item--login" href="/login">login</a>
  </div>
</div>
@endsection

@section('content')

<div class="register__container">
  <div class="register__heading">
    <h2 class="register__heading-title">Register</h2>
  </div>

  <div class="register-form">
    <form class="register-form__content" action="/register" method="post" novalidate>
      @csrf
      <div class="register-form__fields">

        <div class="register-form__field">
          <label class="register-form__field-name" for="name">お名前</label>
          <input class="register-form__input" type="text" name="name" id="name" placeholder="例：山田太郎"
            value="{{ old('name') }}">
          @error('name')
          <ul class="register-form__error">
            @foreach ($errors->get('name') as $message)
            <li>{{ $message }}</li>
            @endforeach
          </ul>
          @enderror
        </div>

        <div class="register-form__field">
          <label class="register-form__field-email" for="email">メールアドレス</label>
          <input class="register-form__input" type="email" name="email" id="email" placeholder="例：test@example.com"
            value="{{ old('email') }}">
          @error('email')
          <ul class="register-form__error">
            @foreach ($errors->get('email') as $message)
            <li>{{ $message }}</li>
            @endforeach
          </ul>
          @enderror
        </div>

        <div class="register-form__field">
          <label class="register-form__field-password" for="password">パスワード</label>
          <input class="register-form__input" type="password" name="password" id="password"
            placeholder="例：coachtech1106">
          @error('password')
          <ul class="register-form__error">
            @foreach ($errors->get('password') as $message)
            <li>{{ $message }}</li>
            @endforeach
          </ul>
          @enderror
        </div>
      </div>

      <div class="register-form__button">
        <button class="register-form__button--submit" type="submit">登録</button>
      </div>

    </form>
  </div>
</div>
@endsection