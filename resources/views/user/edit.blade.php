<h1>さー、どうしますか？</h1>
<hr>
<br>
  <div>
    <tr>
      <td>
        <form method="post" action="{{route('user.update',['id' =>$item->id])}}">
            @csrf
            <input type="hidden" name="situation" id="situation" value="ok" required>
            <button type="submit">購入する</button>
        </form>
      </td>
      <td>
      <form method="post" action="{{route('user.update',['id' =>$item->id])}}">
            @csrf
            <input type="hidden" name="situation" id="situation" value="ng" required>
            <button type="submit">いりません</button>
        </form>
      </td>
    </tr>
  </div>
  <a href="{{ route('user.index') }}">{{ __('一覧へ戻る') }}</a>