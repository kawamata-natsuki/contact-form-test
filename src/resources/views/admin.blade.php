@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('admin.css') }}">
@endsection

@section('link')
<form class="header-nav__item--logout" action="/logout" method="post">
  @csrf
  <button>logout</button>
</form>
@endsection

@section('content')
<h2>Admin</h2>


@endsection