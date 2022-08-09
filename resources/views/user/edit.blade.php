@extends('layouts.app')

@section('content')
<h1>さー、どうしますか？</h1>
<br>
  <div>
    <tr>
      <td>
        <form method="post" action="{{route('user.update',['id' =>$item->id])}}">
            @csrf
            <input type="hidden" name="situation" id="situation" value="ok" required>
            <button type="submit" class="btn btn-primary">購入する</button>
        </form>
      </td>
      <br>
      <td>
      <form method="post" action="{{route('user.update',['id' =>$item->id])}}">
            @csrf
            <input type="hidden" name="situation" id="situation" value="ng" required>
            <button type="submit" class="btn btn-danger">いりません</button>
        </form>
      </td>
    </tr>
  </div>
  <br>
  <a href="{{ route('user.index') }}">{{ __('一覧へ戻る') }}</a>
  @endsection