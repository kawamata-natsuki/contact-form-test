@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('index.css') }}">
@endsection

<!-- バリデーションの設定 -->
@section('content')
<div class="contact-container">

  <div class="contact-form__title">
    <h2>Contact</h2>
  </div>

  <div class="contact-form">
    <form action="/confirm" method="post">
      @csrf
      <div class="contact-form__group">

        <div class="contact-form__item">
          <label class="contact-form__name" for="last_name">お名前<span>※</span></label>
          <div class="contact-form__name--inputs">
            <input class="contact-form__name--input" type="text" name="last_name" id="last_name" placeholder="例：山田">
            <input class="contact-form__name--input" type="text" name="first_name" id="first_name" placeholder="例：太郎">
          </div>
        </div>

        <div class="contact-form__item">
          <label class="contact-form__gender">性別<span>※</span></label>
          <div class="contact-form__gender--inputs">
            <input class="contact-form__gender--radio" type="radio" id="male" name="gender" value="1" checked>
            <label for="male">男性</label>
            <input class="contact-form__gender--radio" type="radio" id="female" name="gender" value="2">
            <label for="female">女性</label>
            <input class="contact-form__gender--radio" type="radio" id="other" name="gender" value="3">
            <label for="other">その他</label>
          </div>
        </div>


        <div class="contact-form__item">
          <label class="contact-form__email" for="email">メールアドレス<span>※</span></label>
          <input class="contact-form__email--input" type="email" name="email" id="email"
            placeholder="例：text@example.com">
        </div>

        <div class="contact-form__item">
          <label class="contact-form__tel" for="area_code">電話番号<span>※</span></label>
          <div class="contact-form__tel--inputs">
            <input class="contact-form__tel--input" type="text" name="area_code" id="area_code" maxlength="5"
              placeholder="080">
            <span>-</span>
            <input class="contact-form__tel--input" type="text" name="prefix" id="prefix" maxlength="5"
              placeholder="1234">
            <span>-</span>
            <input class="contact-form__tel--input" type="text" name="suffix" id="suffix" maxlength="5"
              placeholder="5678">
          </div>
        </div>
        <!-- データベースに保存するときには08012345678の形にするように処理する -->
        <!-- public function store(Request $request)
            {
                // 入力された電話番号の各部分を取得
                $areaCode = $request->input('area_code');
                $prefix = $request->input('prefix');
                $suffix = $request->input('suffix');

                // 電話番号を一つの形式にまとめる
                $phoneNumber = $areaCode . $prefix . $suffix;

                // バリデーション（例: 数字のみで構成されているか）
                $request->validate([
                    'area_code' => 'required|digits:4',
                    'prefix' => 'required|digits:4',
                    'suffix' => 'required|digits:4',
                ]);

                // フォームの他のデータと一緒に電話番号を保存
                $contact = new Contact();
                $contact->tel = $phoneNumber;  // telカラムにまとめた電話番号を保存
                // 他のフォームフィールドも保存
                $contact->save();

                return redirect()->route('contact.index')->with('success', 'お問い合わせが完了しました');
            }
        こんな感じ -->

        <div class="contact-form__item">
          <label class="contact-form__address" for="address">住所<span>※</span></label>
          <input class="contact-form__address--input" type="text" name="address" id="address"
            placeholder="例：東京都渋谷区千駄ヶ谷1-2-3">
        </div>

        <div class="contact-form__item">
          <label class="contact-form__building" for="building">建物</label>
          <input class="contact-form__building--input" type="text" name="building" id="building"
            placeholder="例：千駄ヶ谷マンション101">
        </div>

        <div class="contact-form__item">
          <label class="contact-form__content" for="content">お問い合わせの種類<span>※</span></label>
          <select name="content" id="content">
            <option value="" disabled selected>選択してください</option>
            <option value="商品のお届けについて">商品のお届けについて</option>
            <option value="商品の交換について">商品の交換について</option>
            <option value="商品トラブル">トラブル</option>
            <option value="ショップへのお問い合わせ">ショップへのお問い合わせ</option>
            <option value="その他">その他</option>
          </select>
        </div>
        <!-- 選択してくださいの文字色をplaceholderと同じ薄い色にCSSで変更する -->

        <div class="contact-form__item">
          <label class="contact-form__detail" for="detail">お問い合わせ内容<span>※</span></label>
          <textarea class="contact-form__detail--textarea" name="detail" id="detail"
            placeholder="お問い合わせ内容をご記載ください"></textarea>
        </div>
      </div>

      <div class="contact-form__button">
        <button type="submit">確認画面</button>
      </div>
    </form>

  </div>
</div>

@endsection