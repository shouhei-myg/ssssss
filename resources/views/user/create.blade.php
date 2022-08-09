@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <title>一覧</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
  </head>
  <body>
    <h1>新規申請</h1>
    <a href="https://www.amazon.co.jp/" class="fab fa-amazon" style="font-size:20px;" target="_blank" style="text-decoration:none;">で探す</a>
    <br>
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
      <button type="submit" class="btn btn-primary">申請</button>
    </form>
    <br>
    <a href="{{ route('user.index') }}" style="text-decoration:none;">{{ __('一覧へ戻る') }}</a>
  </body>
</html>
@endsection