<h1>新規申請</h1>

<form method="POST" action="">
  @csrf

  <div>
    <label for="form-name">名前</label>
    <input type="text" name="name" id="form-name" required>
  </div>

  <div>
    <label for="form-email">メールアドレス</label>
    <input type="email" name="email" id="form-email">
  </div>

  <button type="submit">登録</button>

</form>