@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('index.css') }}">
@endsection

@section('content')
<div class="contact__container">

  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>

  <div class="contact-form">
    <form action="{{ route('contact.confirm') }}" method="post">
      @csrf
      <div class="contact-form__fields">

        <div class="contact-form__field">
          <label class="contact-form__name" for="last_name">お名前<span>※</span></label>
          <div class="contact-form__name-inputs">
            <input class="contact-form__name-input" type="text" name="last_name" id="last_name" placeholder="例：山田"
              value="{{ old('last_name', session('contact.last_name')) }}">
            <input class="contact-form__name-input" type="text" name="first_name" id="first_name" placeholder="例：太郎"
              value="{{ old('first_name', session('contact.first_name')) }}">
          </div>
          @error('last_name')
          <p class="contact-form__error">{{ $message }}</p>
          @enderror
          @error('first_name')
          <p class="contact-form__error">{{ $message }}</p>
          @enderror
        </div>

        <!-- 初期値が男性になっているけど、CSSのUIトリックで見せかけのようにできないか確認 -->
        <div class="contact-form__field">
          <label class="contact-form__gender">性別<span>※</span></label>
          <div class="contact-form__gender-inputs">
            <label for="male">男性</label>
            <input class="contact-form__gender-radio" type="radio" id="male" name="gender" value="1" {{(old('gender',
              session('contact.gender', 1))==1) ? 'checked' : '' }}>
            <label for="female">女性</label>
            <input class="contact-form__gender-radio" type="radio" id="female" name="gender" value="2" {{(old('gender',
              session('contact.gender'))==2) ? 'checked' : '' }}>
            <label for="other">その他</label>
            <input class="contact-form__gender-radio" type="radio" id="other" name="gender" value="3" {{ (old('gender',
              session('contact.gender'))==3) ? 'checked' : '' }}>
          </div>
          @error('gender')
          <p class="contact-form__error">{{ $message }}</p>
          @enderror
        </div>

        <div class="contact-form__field">
          <label class="contact-form__email" for="email">メールアドレス<span>※</span></label>
          <input class="contact-form__email-input" type="email" name="email" id="email" placeholder="例：text@example.com"
            value="{{ old('email', session('contact.email')) }}">
          @error('email')
          <p class="contact-form__error">{{ $message }}</p>
          @enderror
        </div>

        <div class="contact-form__field">
          <label class="contact-form__tel" for="area_code">電話番号<span>※</span></label>
          <div class="contact-form__tel-inputs">
            <input class="contact-form__tel-input" type="text" name="area_code" id="area_code" placeholder="080"
              value="{{ old('area_code', session('contact.area_code')) }}">
            <span>-</span>
            <input class="contact-form__tel-input" type="text" name="prefix" id="prefix" placeholder="1234"
              value="{{ old('prefix', session('contact.prefix')) }}">
            <span>-</span>
            <input class="contact-form__tel-input" type="text" name="suffix" id="suffix" placeholder="5678"
              value="{{ old('suffix', session('contact.suffix')) }}">
          </div>
          @if ($errors->has('tel'))
          <p class="contact-form__error">{{ $errors->first('tel') }}</p>
          @endif
          @if ($errors->has('area_code') || $errors->has('prefix') || $errors->has('suffix'))
          <p class="contact-form__error">電話番号は5桁までの数字で入力してください</p>
          @endif
        </div>

        <div class="contact-form__field">
          <label class="contact-form__address" for="address">住所<span>※</span></label>
          <input class="contact-form__address-input" type="text" name="address" id="address"
            placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', session('contact.address')) }}">
          @error('address')
          <p class="contact-form__error">{{ $message }}</p>
          @enderror

        </div>

        <div class="contact-form__field">
          <label class="contact-form__building" for="building">建物</label>
          <input class="contact-form__building-input" type="text" name="building" id="building"
            placeholder="例：千駄ヶ谷マンション101" value="{{ old('building', session('contact.building')) }}">
          @error('building')
          <p class="contact-form__error">{{ $message }}</p>
          @enderror

        </div>

        <div class="contact-form__field">
          <label class="contact-form__content" for="content">お問い合わせの種類<span>※</span></label>
          <select class="contact-form__content-select" name="content" id="content">
            <option value="" disabled {{ old('content', session('contact.content')) ? '' : 'selected' }}>
              選択してください
            </option>
            <option value="商品のお届けについて" {{ old('content', session('contact.content'))=='商品のお届けについて' ? 'selected' : '' }}>
              商品のお届けについて
            </option>
            <option value="商品の交換について" {{ old('content', session('contact.content'))=='商品の交換について' ? 'selected' : '' }}>
              商品の交換について
            </option>
            <option value="商品トラブル" {{ old('content', session('contact.content'))=='商品トラブル' ? 'selected' : '' }}>
              商品トラブル
            </option>
            <option value="ショップへのお問い合わせ" {{ old('content', session('contact.content'))=='ショップへのお問い合わせ' ? 'selected' : ''
              }}>
              ショップへのお問い合わせ
            </option>
            <option value="その他" {{ old('content', session('contact.content'))=='その他' ? 'selected' : '' }}>
              その他
            </option>
          </select>
          @error('content')
          <p class="contact-form__error">{{ $message }}</p>
          @enderror
        </div>
        <!-- 選択してくださいの文字色をplaceholderと同じ薄い色にCSSで変更する -->

        <div class="contact-form__field">
          <label class="contact-form__detail" for="detail">お問い合わせ内容<span>※</span></label>
          <textarea class="contact-form__detail-textarea" name="detail" id="detail"
            placeholder="お問い合わせ内容をご記載ください">{{ old('detail', session('contact.detail')) }}</textarea>
          @error('detail')
          <p class="contact-form__error">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="contact-form__button">
        <button type="submit">確認画面</button>
      </div>
    </form>

  </div>
</div>

@endsection