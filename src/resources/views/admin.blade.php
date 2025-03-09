@extends('layouts.app')

<style>
  svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
  }
</style>

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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

    <div class="admin__serch-form">
      <form action="/admin" method="get">
        <div class="admin__serch-form__item">
          <input type="text" name="search" value="{{ request('search') }}" placeholder="名前やメールアドレスを入力してください">
        </div>

        <div class="admin__serch-form__item">
          <select name="gender">
            <option value="" disabled {{ is_null(request('gender')) || request('gender')==="" ? 'selected' : '' }}>性別
            </option>
            <option value="1" {{ request('gender')==="1" ? 'selected' : '' }}>男性</option>
            <option value="2" {{ request('gender')==="2" ? 'selected' : '' }}>女性</option>
            <option value="3" {{ request('gender')==="3" ? 'selected' : '' }}>その他</option>
            <option value="all" {{ request('gender')==="all" ? 'selected' : '' }}>全て</option>
          </select>
        </div>


        <div class="admin__serch-form__item">
          <select name="category_id">
            <option value="" {{ request('category_id')===null ? 'selected' : '' }}>お問い合わせの種類</option>
            <option value="1" {{ request('category_id')==="1" ? 'selected' : '' }}>商品のお届けについて</option>
            <option value="2" {{ request('category_id')==="2" ? 'selected' : '' }}>商品の交換について</option>
            <option value="3" {{ request('category_id')==="3" ? 'selected' : '' }}>商品トラブル</option>
            <option value="4" {{ request('category_id')==="4" ? 'selected' : '' }}>ショップへのお問い合わせ</option>
            <option value="5" {{ request('category_id')==="5" ? 'selected' : '' }}>その他</option>
          </select>
        </div>

        <div class="admin__serch-form__item">
          <input type="date" name="created_at" value="{{ request('created_at') }}">
        </div>

        <div class=" admin__serch-form__item">
          <button type="submit">検索</button>
        </div>

        <div class="admin__serch-form__item">
          <button type="sunmit" name="reset" value="1">リセット</button>
        </div>

      </form>
    </div>

    <div class="admin__actions">
      <div class="admin__action-export">
        <form action="{{ route('admin.export') }}" method="get">
          <input type="hidden" name="search" value="{{ request('search') }}">
          <input type="hidden" name="gender" value="{{ request('gender') }}">
          <input type="hidden" name="category_id" value="{{ request('category_id') }}">
          <input type="hidden" name="created_at" value="{{ request('created_at') }}">
          <button type="submit" class="btn btn-success">CSVエクスポート</button>
        </form>
      </div>

      <div class="admin__pagination">
        {{ $contacts->appends(request()->query())->links('pagination::bootstrap-4') }}
      </div>
    </div>

    <div class="admin__table">
      <table>
        <thead>
          <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
          </tr>
        </thead>
        <tbody>
          @if(isset($contacts) && $contacts->count() > 0)
          @foreach ($contacts as $contact)
          <tr>
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}</td>
            <td>{{ $contact->category->content}}</td>
            <td>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#detailModal{{ $contact->id }}">
                詳細
              </button>
            </td>
          </tr>

          <!-- モーダルウィンドウ -->
          <div class="modal fade" id="detailModal{{ $contact->id }}" tabindex="-1"
            aria-labelledby="detailModalLabel{{ $contact->id }}" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                </div>
                <div class="modal-body">
                  <p>
                    <strong>お名前</strong>
                    {{ $contact->last_name }} {{ $contact->first_name }}
                  </p>
                  <p>
                    <strong>性別</strong>
                    {{ $contact->gender }}
                  </p>
                  <p>
                    <strong>メールアドレス</strong>
                    {{ $contact->email }}
                  </p>
                  <p>
                    <strong>電話番号</strong>
                    {{ $contact->tel }}
                  </p>
                  <p>
                    <strong>住所</strong>
                    {{ $contact->address }}
                  </p>
                  <p>
                    <strong>建物名</strong>
                    {{ $contact->building }}
                  </p>
                  <p>
                    <strong>お問い合わせの種類</strong>
                    {{ $contact->category_id }}
                  </p>
                  <p>
                    <strong>お問い合わせ内容</strong>
                    {{ $contact->detail }}
                  </p>
                </div>
                <div class="modal-footer">
                  <form action="{{ route('admin.contact.destroy', ['id'=> $contact->id]) }}" method="post"
                    class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger">
                      削除
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          @endforeach
          @else
          <tr>
            <td colspan="5" style="text-align: center;">お問い合わせはありません</td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection