@extends('layouts.app')

<!--
@section('css')
<link rel="stylesheet" href="{{ asset('confirm.css') }}">
@endsection
  -->
@section('content')

<div class="confirm__container">

  <div class="confirm__heading">
    <h2>Confirm</h2>
  </div>

  <div class="confirm">


    <form action="{{ route('contact.store') }}" method="post">
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
                {{ $contact['category_id'] }}
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
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

    <form action="{{ route('contact.create') }}" method="get">
      <div class="confirm__buttons">
        <button class="confirm__button--modify" type="submit">修正</button>
      </div>
    </form>

  </div>
</div>
@endsection