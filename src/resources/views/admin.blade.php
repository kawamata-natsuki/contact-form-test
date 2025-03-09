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

<div class="admin__container">
  <div class="admin__heading">
    <h2>Admin</h2>
  </div>

  <div class="admin">

    <div class="admin__filters">
      <form action="" method="get">
        @csrf
        <div class="admin__filter-item">
          <input type="text" name="query" placeholder="名前やメールアドレスを入力してください">
        </div>

        <!-- value 確認　1,2,3 -->
        <div class="admin__filter-item">
          <select name="gender">
            <option value="" disabled selected>性別</option>
            <option value="1">男性</option>
            <option value="2">女性</option>
            <option value="3">その他</option>
          </select>
        </div>

        <!-- name確認　content category_id -->
        <div class="admin__filter-item">
          <select name="category_id">
            <option value="" disabled selected>お問い合わせの種類</option>
            <option value="1">商品のお届けについて</option>
            <option value="2">商品の交換について</option>
            <option value="3">商品トラブル</option>
            <option value="4">ショップへのお問い合わせ</option>
            <option value="5">その他</option>
          </select>
        </div>

        <div class="admin__filter-item">
          <input type="date">
        </div>

        <div class="admin__filter-item">
          <button type="submit">検索</button>
        </div>

        <!-- リセットボタン -->
        <div class="admin__filter-item">
          <button type="reset">リセット</button>
        </div>

      </form>
    </div>


    <div class="admin__actions">
      <div class="admin__action-export">
        <button></button>
      </div>

      <div class="admin__pagination">

      </div>
    </div>

    <div class="admin__table">
      <table>
        <thead>
          <tr>
            <th>

            </th>
          </tr>
        </thead>
      </table>

    </div>

  </div>

</div>


@endsection