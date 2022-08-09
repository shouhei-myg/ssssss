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
    <h1>一覧表示</h1>
    </i><a href="{{ route('user.create') }}" style="text-decoration:none;" class="btn btn-success">{{ __('新規申請') }}</a>
    <br>
    <br>
    <table>
      <tr>
        <th><i class="fas fa-user" style="font-size:20px;"></i></th>
        <th><i class="fab fa-amazon" style="font-size:20px;"></th>
        <th>用途</th>
        <th><i class="fas fa-clock" style="font-size:20px;"></i></th>
        <th>結果</th>
      </tr>
      @foreach( $items as $item )
      <tr>
        <td>{{ $item->name }}</td>
        <td><a href="{{ $item->url }}" style="text-decoration:none;" target="_blank">{{$item->product_name}}</a></td>
        <td>{{ $item->usage }}</td>
        <td>{{ $item->created_at }}</td>
        <td>{{ $item->situation }}</td>
        <td>
          @if( $item->user_id == $user->id && !$item->situation)
            <form action="{{ route('user.destroy', ['id'=>$item->item_id]) }}" method="post">
              @csrf
              <button type="submit" class="btn btn-danger">削除</button>
            </form>
          @endif
        </td>
        <td>
          @if( $user->role == 1 && !$item->situation)
            <form action="{{route('user.edit',['id'=>$item->item_id])}}">
              @csrf
              <button type="submit" class="btn btn-primary">{{ __(' 審査') }}</button>
            </form>
          @endif
        </td>
      </tr>
      @endforeach
    </table>
  </body>
</html>
@endsection

