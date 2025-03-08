@extends('layouts.app')

<!-- デバック -->
<?php print_r($contact) ?>

@section('css')
<link rel="stylesheet" href="{{ asset('confirm.css') }}">
@endsection

<!-- バリデーションの設定 -->
@section('content')

<div class="confirm-container">

  <div class="confirm__heading">
    <h2>Confirm</h2>
  </div>

  <div class="confirm">

    <form action="/contact" method="post">
      @csrf
      <div class="confirm__table">
        <table>
          <tbody>

            <tr class="confirm__table-row">
              <th class="confirm__table-header">お名前</th>
              <td class="confirm__table-text">
                {{ $contact['last_name'] }}　{{ $contact['first_name'] }}
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
              </td>
            </tr>

            <tr class="confirm__table-row">
              <th class="confirm__table-header">性別</th>
              <td class="confirm__table-text">
                {{ $contact['genderText'] }}
                <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
              </td>
            </tr>

            <tr class="confirm__table-row">
              <th class="confirm__table-header">メールアドレス</th>
              <td class="confirm__table-text">
                {{ $contact['email'] }}
                <input type="hidden" name="email" value="{{ $contact['email'] }}">
              </td>
            </tr>

            <tr class="confirm__table-row">
              <th class="confirm__table-header">電話番号</th>
              <td class="confirm__table-text">
                {{ $contact['tel'] }}
                <input type="hidden" name="tel" value="{{ $contact['tel'] }}">
              </td>
            </tr>

            <tr class="confirm__table-row">
              <th class="confirm__table-header">住所</th>
              <td class="confirm__table-text">
                {{ $contact['address'] }}
                <input type="hidden" name="address" value="{{ $contact['address'] }}">
              </td>
            </tr>

            <tr class="confirm__table-row">
              <th class="confirm__table-header">建物名</th>
              <td class="confirm__table-text">
                {{ $contact['building'] ?? '' }}
                <input type="hidden" name="building" value="{{ $contact['building'] }}">
              </td>
            </tr>

            <tr class="confirm__table-row">
              <th class="confirm__table-header">お問い合わせの種類</th>
              <td class="confirm__table-text">
                {{ $contact['content'] }}
                <input type="hidden" name="content" value="{{ $contact['content'] }}">
              </td>
            </tr>

            <tr class="confirm__table-row">
              <th class="confirm__table-header">お問い合わせ内容</th>
              <td class="confirm__table-text">
                {{ $contact['detail'] }}
                <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
              </td>
            </tr>

          </tbody>
        </table>
      </div>

      <div class="confirm__buttons">
        <button class="confirm__button--submit" type="submit">送信</button>
      </div>
    </form>

    <form action="/" method="post">
      @csrf
      <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
      <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
      <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
      <input type="hidden" name="email" value="{{ $contact['email'] }}">
      <input type="hidden" name="tel" value="{{ $contact['tel'] }}">
      <!-- フォーム入力画面で復元する用 -->
      <input type="hidden" name="area_code" value="{{ substr($contact['tel'], 0, 3) }}">
      <input type="hidden" name="prefix" value="{{ substr($contact['tel'], 3, 4) }}">
      <input type="hidden" name="suffix" value="{{ substr($contact['tel'], 7, 4) }}">
      <input type="hidden" name="address" value="{{ $contact['address'] }}">
      <input type="hidden" name="building" value="{{ $contact['building'] }}">
      <input type="hidden" name="content" value="{{ $contact['content'] }}">
      <input type="hidden" name="detail" value="{{ $contact['detail'] }}">

      <div class="confirm__buttons">
        <button class="confirm__button--modify" type="submit">修正</button>
      </div>
    </form>

  </div>
</div>
@endsection