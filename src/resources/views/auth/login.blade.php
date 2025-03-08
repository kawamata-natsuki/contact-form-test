@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('login.css') }}">
@endsection

@section('link')
<a class="header-nav__item--register" href="/register">login</a>
@endsection


@section('content')

<h2>Login</h2>

<!-- 登録済のユーザーだけがログインできるようにする -->
<!-- バリデーションの設定 -->

<form action="/login" method="post">
  @csrf
  <p>メールアドレス</p>
  <input type="email" name="email" value="{{ old('email') }}">
  <p>パスワード</p>
  <input type="password" name="password">

  <button type="submit">ログイン</button>
</form>


@endsection