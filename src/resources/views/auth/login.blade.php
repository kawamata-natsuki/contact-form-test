@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('link')
<div class="header-nav">
  <div class="header-nav__item">
    <a class="header-nav__item--register" href="/register">register</a>
  </div>
</div>
@endsection

@section('content')
<div class="login__container">
  @if (session('success'))
  <div class="login-form__success">
    {{ session('success') }}
  </div>
  @endif
  <div class="login__heading">
    <h2 class="login__heading-title">
      Login
    </h2>
  </div>

  <div class="login-form">
    <form class="login-form__content" action="/login" method="post">
      @csrf
      <div class="login-form__fields">
        <div class="login-form__field">
          <label class="login-form__label" for="email">メールアドレス</label>
          <input class="login-form__input" type="email" name="email" id="email" placeholder="例：test@example.com"
            value="{{ old('email') }}">
          @error('email')
          <ul class="login-form__error">
            @foreach ($errors->get('email') as $message)
            <li>{{ $message }}</li>
            @endforeach
          </ul>
          @enderror
        </div>

        <div class="login-form__field">
          <label class="login-form__label" for="password">パスワード</label>
          <input class="login-form__input" type="password" name="password" id="password" placeholder="例：coachtech1106">
          @error('email')
          <ul class="login-form__error">
            @foreach ($errors->get('password') as $message)
            <li>{{ $message }}</li>
            @endforeach
          </ul>
          @enderror
        </div>

      </div>
      <div class="login-form__button">
        <button class="login-form__button--submit" type="submit">ログイン</button>
      </div>
    </form>
  </div>
</div>
@endsection