@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('register.css') }}">
@endsection

@section('link')
<a class="header-nav__item--login" href="/login">login</a>
@endsection

@section('content')

<div class="register__container">
  <div class="register__heading">
    <h2>Register</h2>
  </div>

  <div class="register-form">
    <form action="/register" method="post">
      @csrf
      <div class="register-form__fields">

        <div class="register-form__field">
          <p>お名前</p>
          <input type="text" name="name" value="{{ old('name') }}">
          @error('name')
          <p class="register-form__error">{{ $message }}</p>
          @enderror
        </div>

        <div class="register-form__field">
          <p>メールアドレス</p>
          <input type="email" name="email" value="{{ old('email') }}">
          @error('email')
          <p class="register-form__error">{{ $message }}</p>
          @enderror
        </div>

        <div class="register-form__field">
          <p>パスワード</p>
          <input type="password" name="password">
          @error('password')
          <p class="register-form__error">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="register-form__button">
        <button type="submit">登録</button>
      </div>

    </form>

  </div>
</div>
@endsection