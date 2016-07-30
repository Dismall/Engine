<?php
/* Smarty version 3.1.29, created on 2016-07-19 19:01:10
  from "W:\domains\Engine\views\default\admin\authForm.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578e4ec6989556_44633194',
  'file_dependency' => 
  array (
    '7b35df8fad3b983fb37faa177872d8f801396e19' => 
    array (
      0 => 'W:\\domains\\Engine\\views\\default\\admin\\authForm.tpl',
      1 => 1468522284,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578e4ec6989556_44633194 ($_smarty_tpl) {
?>
<form action="/admin/auth" method="post">
    <p>Авторизация</p>
    <input type="text" name="username" required="true" placeholder="Логин" pattern="[A-Za-zА-Яа-яЁё_]{3,20}" autocomplete="on"/>
    <input type="password" name="password" required="true" placeholder="Пароль" />
    <button type="submit">Вход</button
</form>
<?php }
}
