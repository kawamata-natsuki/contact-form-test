@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact__container">

  <div class="contact__heading">
    <h2 class="contact__heading-title">Contact</h2>
  </div>

  <div class="contact-form">
    <form class="contact-form__content" action="{{ route('contact.confirm') }}" method="post">
      @csrf
      <div class="contact-form__fields">

        <div class="contact-form__field">
          <label class="contact-form__label" for="last_name">お名前<span>※</span></label>
          <div class="contact-form__input">
            <div class="contact-form__input-group--name">
              <input class="contact-form__input--name" type="text" name="last_name" id="last_name" placeholder="例：山田"
                value="{{ old('last_name', session('contact.last_name')) }}">
              @error('last_name')
              <ul class="contact-form__error">
                @foreach ($errors->get('last_name') as $message)
                <li>{{ $message }}</li>
                @endforeach
              </ul>
              @enderror

              <input class="contact-form__input--name" type="text" name="first_name" id="first_name" placeholder="例：太郎"
                value="{{ old('first_name', session('contact.first_name')) }}">
              @error('first_name')
              <ul class="contact-form__error">
                @foreach ($errors->get('first_name') as $message)
                <li>{{ $message }}</li>
                @endforeach
              </ul>
              @enderror
            </div>
          </div>
        </div>


        <div class="contact-form__field">
          <label class="contact-form__label">性別<span>※</span></label>
          <div class="contact-form__radio-group">
            <div class="contact-form__input">
              <div class="contact-form__input">
                <input class="contact-form__radio" type="radio" id="male" name="gender" value="1"
                  {{(old('gender',session('contact.gender', 1))==1) ? 'checked' : '' }}>
                <label class="contact-form__radio--item" for="male">男性</label>
              </div>
            </div>
            <div class="contact-form__input">
              <input class="contact-form__radio" type="radio" id="female" name="gender" value="2"
                {{(old('gender',session('contact.gender'))==2) ? 'checked' : '' }}>
              <label class="contact-form__radio--item" for="female">女性</label>
            </div>
            <div class="contact-form__input">
              <input class="contact-form__radio" type="radio" id="other" name="gender" value="3" {{
                (old('gender',session('contact.gender'))==3) ? 'checked' : '' }}>
              <label class="contact-form__radio--item" for="other">その他</label>
            </div>
          </div>
          @error('gender')
          <ul class="contact-form__error">
            @foreach ($errors->get('gender') as $message)
            <li>{{ $message }}</li>
            @endforeach
          </ul>
          @enderror
        </div>

        <div class="contact-form__field">
          <label class="contact-form__label" for="email">メールアドレス<span>※</span></label>
          <div class="contact-form__input">
            <input class="contact-form__input--email" type="email" name="email" id="email"
              placeholder="例：text@example.com" value="{{ old('email', session('contact.email')) }}">
            @error('email')
            <ul class="contact-form__error">
              @foreach ($errors->get('email') as $message)
              <li>{{ $message }}</li>
              @endforeach
            </ul>
            @enderror
          </div>
        </div>

        <div class="contact-form__field">
          <label class="contact-form__label" for="area_code">電話番号<span>※</span></label>
          <div class="contact-form__input-group--tel">
            <div class="contact-form__input">
              <input class="contact-form__input--tel" type="text" name="area_code" id="area_code" placeholder="080"
                value="{{ old('area_code', session('area_code')) }}">
              <span>-</span>
              <input class="contact-form__input--tel" type="text" name="prefix" id="prefix" placeholder="1234"
                value="{{ old('prefix', session('prefix')) }}">
              <span>-</span>
              <input class="contact-form__input--tel" type="text" name="suffix" id="suffix" placeholder="5678"
                value="{{ old('suffix', session('suffix')) }}">
              @if ($errors->has('tel'))
              <p class="contact-form__error">{{ $errors->first('tel') }}</p>
              @endif
              @if ($errors->has('area_code') || $errors->has('prefix') || $errors->has('suffix'))
              <p class="contact-form__error">電話番号は5桁までの数字で入力してください</p>
              @endif
            </div>
          </div>
        </div>


        <div class="contact-form__field">
          <label class="contact-form__label" for="address">住所<span>※</span></label>
          <input class="contact-form__input" type="text" name="address" id="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3"
            value="{{ old('address', session('contact.address')) }}">
          @error('address')
          <ul class="contact-form__error">
            @foreach ($errors->get('address') as $message)
            <li>{{ $message }}</li>
            @endforeach
          </ul>
          @enderror
        </div>

        <div class="contact-form__field">
          <label class="contact-form__label" for="building">建物</label>
          <input class="contact-form__input" type="text" name="building" id="building" placeholder="例：千駄ヶ谷マンション101"
            value="{{ old('building', session('contact.building')) }}">
          @error('building')
          <ul class="contact-form__error">
            @foreach ($errors->get('address') as $message)
            <li>{{ $message }}</li>
            @endforeach
          </ul>
          @enderror
        </div>

        <div class="contact-form__field">
          <label class="contact-form__label" for="content">お問い合わせの種類<span>※</span></label>
          <select class="contact-form__input" name="content" id="content">
            <option value="" disabled {{ old('content', session('content')) ? '' : 'selected' }}>
              選択してください
            </option>
            <option value="商品のお届けについて" {{ old('content', session('content'))=='商品のお届けについて' ? 'selected' : '' }}>
              商品のお届けについて
            </option>
            <option value="商品の交換について" {{ old('content', session('content'))=='商品の交換について' ? 'selected' : '' }}>
              商品の交換について
            </option>
            <option value="商品トラブル" {{ old('content', session('content'))=='商品トラブル' ? 'selected' : '' }}>
              商品トラブル
            </option>
            <option value="ショップへのお問い合わせ" {{ old('content', session('content'))=='ショップへのお問い合わせ' ? 'selected' : '' }}>
              ショップへのお問い合わせ
            </option>
            <option value="その他" {{ old('content', session('content'))=='その他' ? 'selected' : '' }}>
              その他
            </option>
          </select>
          @error('content')
          <ul class="contact-form__error">
            @foreach ($errors->get('content') as $message)
            <li>{{ $message }}</li>
            @endforeach
          </ul>
          @enderror
        </div>

        <div class="contact-form__field">
          <label class="contact-form__label" for="detail">お問い合わせ内容<span>※</span></label>
          <textarea class="contact-form__input" name="detail" id="detail"
            placeholder="お問い合わせ内容をご記載ください">{{ old('detail', session('contact.detail')) }}</textarea>
          @error('detail')
          <ul class="contact-form__error">
            @foreach ($errors->get('detail') as $message)
            <li>{{ $message }}</li>
            @endforeach
          </ul>
          @enderror
        </div>
      </div>
      <div class="contact-form__button">
        <button class="contact-form__button--submit" type="submit">
          確認画面</button>
      </div>
  </div>
  </form>

</div>
</div>
@endsection