@extends('layouts.app')

@section('content')
<h1>一覧表示</h1>
<a href="{{ route('user.create') }}" style="text-decoration:none;">{{ __('新規申請') }}</a>
<table>
  <tr>
    <th>名前</th>
    <th>品名</th>
    <th>用途</th>
    <th>申請日</th>
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
          <button type="submit" class="">削除</button>
        </form>
      @endif
    </td>
    <td>
      @if( $user->role == 1 && !$item->situation)
        <a href="{{route('user.edit',['id'=>$item->item_id])}}">{{ __(' 審査') }}</a>
      @endif
    </td>
  </tr>
  @endforeach
</table>
@endsection

