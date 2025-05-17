
<form action="/Registration" method="post" class="btn btn-primary">

<label for="login">Имя пользователя:</label>
<input name="username" type="text" id="login">
<br>
<br>
<label for="pass">Пароль:</label>
<input name="password" type="password" id="pass">
<br>
<br>
<label for="repeatPass">Повтоить пароль:</label>
<input name="repeatPass" type="password" id="repeatPass">
<br>
<br>
<label for="selector">Выберите роль:</label>
<select name="role" id="selector" >
  <option value="advertiser" selected>Рекламодатель</option>

  <option value="webmaster">WebMaster</option>
  <option value="admin">Admin</option>
</select>
<br>
<br>
<input name="reg" type="submit" value="Зарегистрироваться" >



</form>
