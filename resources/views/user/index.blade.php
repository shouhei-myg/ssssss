<h1>一覧表示</h1>
<a href="{{ route('user.create') }}" style="text-decoration:none;">{{ __('新規申請') }}</a>
<hr>
<table>
  <tr>
    <th>名前</th>
    <th>品名</th>
    <th>用途</th>
    <th>申請日</th>
  </tr>
  @foreach( $items as $item )
  <tr>
    <td>{{ $item->user_id }}</td>
    <td><a href="{{ $item->url }}" style="text-decoration:none;" target="_blank">{{$item->product_name}}</a></td>
    <td>{{ $item->usage }}</td>
    <td>{{ $item->created_at }}</td>
    <td>
      @if( $item->user_id == $my_id )
      <form action="{{ route('user.destroy', ['id'=>$item->id]) }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger">削除</button>
    </form>
    @endif
    </td>
  </tr>
  @endforeach
</table>