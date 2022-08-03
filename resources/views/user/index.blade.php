<h1>一覧表示</h1>

<table>
<tr>
<th>ID</th>
<th>名前</th>
<th>item</th>
</tr>
@foreach($items as $item)
<tr>
    <td>{{$item->id}}</td>
    <td>{{$item->user_id}}</td>
    <td><a href="{{$item->item}}" target="_blank">{{$item->item}}</a></td>
    <td>
        @if($item->user_id == 2)
        <a href="#">削除</a>
        @endif
    </td>
</tr>
@endforeach
</table>