@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('login.css') }}">
@endsection

@section('link')
<a class="header-nav__item--register" href="/register">register</a>
@endsection


@section('content')
<!-- 登録済のユーザーだけがログインできるようにする -->
<div class="login__container">
  <div class="login-form__heading">
    <h2>Login</h2>
  </div>

  <div class="login-form">
    <form action="/login" method="post">
      @csrf
      <div class="login-form__fields">
        <div class="login-form__field">
          <p>メールアドレス</p>
          <input type="email" name="email" value="{{ old('email') }}">
          @error('email')
          <p class="login-form__error">{{ $message }}</p>
          @enderror
        </div>

        <div class="login-form__field">
          <p>パスワード</p>
          <input type="password" name="password">
          @error('password')
          <p class="login-form__error">{{ $message }}</p>
          @enderror
        </div>

      </div>
      <div class="login-form__button">
        <button type="submit">ログイン</button>
      </div>
    </form>

  </div>
</div>

@endsection