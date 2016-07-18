<form action="/admin/auth" method="post">
    <p>Авторизация</p>
    <input type="text" name="username" required="true" placeholder="Логин" pattern="[A-Za-zА-Яа-яЁё_]{literal}{3,20}{/literal}" autocomplete="on"/>
    <input type="password" name="password" required="true" placeholder="Пароль" />
    <button type="submit">Вход</button
</form>
