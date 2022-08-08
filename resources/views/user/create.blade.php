@extends('layouts.app')

@section('content')
<h1>新規申請</h1>
<br>
<form method="POST" action="{{route('user.store')}}">
  @csrf
  <div>
    <label for="product_name">品名</label>
    <input type="text" name="product_name" id="product_name" required>
  </div>
  <div>
    <label for="url">itemURL</label>
    <input type="text" name="url" id="url">
  </div>
  <div>
    <label for="usage">用途</label>
    <input type="text" name="usage" id="usage">
  </div>
  <br>
  <button type="submit">申請</button>
</form>
<a href="{{ route('user.index') }}">{{ __('一覧へ戻る') }}</a>
@endsection