@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('register.css') }}">
@endsection

@section('link')
<a class="header-nav__item--login" href="/login">login</a>
@endsection

@section('content')

<h2>Register</h2>

<!-- バリデーションの設定 -->

<form action="/register" method="post">
  @csrf
  <p>お名前</p>
  <input type="text" name="name" value="{{ old('name') }}">
  <p>メールアドレス</p>
  <input type="email" name="email" value="{{ old('email') }}">
  <p>パスワード</p>
  <input type="password" name="password">

  <button type="submit">登録</button>
</form>
@endsection