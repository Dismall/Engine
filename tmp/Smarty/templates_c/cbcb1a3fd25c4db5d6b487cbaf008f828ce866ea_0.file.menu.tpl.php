<?php
/* Smarty version 3.1.29, created on 2016-07-19 19:01:16
  from "W:\domains\Engine\views\default\admin\menu.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578e4ecc754b68_12329577',
  'file_dependency' => 
  array (
    'cbcb1a3fd25c4db5d6b487cbaf008f828ce866ea' => 
    array (
      0 => 'W:\\domains\\Engine\\views\\default\\admin\\menu.tpl',
      1 => 1468619294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578e4ecc754b68_12329577 ($_smarty_tpl) {
?>
<nav>
    <ul class="menu">
        <li><a href="/admin">Главная</a></li>
        <li>
            <a href="/admin/modules">Модули</a>
            <ul class="submenu">
                <li><a href="/admin/modules/articles">Статьи</a></li>
                <li><a href="/admin/modules/pages">Страницы</a></li>
            </ul>
        </li>
        <li><a href="/admin/me">Аккаунт</a></li>
        <li>
            <a href="/admin/settings">Настройки</a>
            <ul class="submenu">
                <li><a href="/admin/personal">Пользователи</a></li>
                <li><a href="/admin/theme">Тема</a></li>
                <li><a href="/admin/basic">Общие настройки</a></li>
            </ul>
        </li>
        <li><a href="/admin/logout">Выход</a></li>
        <?php if ($_smarty_tpl->tpl_vars['module_actions']->value) {?>
            <li class="flr">
                <a href="/admin/modules/<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
</a>
                <ul class="rsubmenu">
                    <?php
$_from = $_smarty_tpl->tpl_vars['module_actions']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_action_0_saved_item = isset($_smarty_tpl->tpl_vars['action']) ? $_smarty_tpl->tpl_vars['action'] : false;
$__foreach_action_0_saved_key = isset($_smarty_tpl->tpl_vars['action_name']) ? $_smarty_tpl->tpl_vars['action_name'] : false;
$_smarty_tpl->tpl_vars['action'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['action_name'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['action']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['action_name']->value => $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->_loop = true;
$__foreach_action_0_saved_local_item = $_smarty_tpl->tpl_vars['action'];
?>
                        <li><a href="/admin/modules/<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['action_name']->value;?>
</a></li>
                    <?php
$_smarty_tpl->tpl_vars['action'] = $__foreach_action_0_saved_local_item;
}
if ($__foreach_action_0_saved_item) {
$_smarty_tpl->tpl_vars['action'] = $__foreach_action_0_saved_item;
}
if ($__foreach_action_0_saved_key) {
$_smarty_tpl->tpl_vars['action_name'] = $__foreach_action_0_saved_key;
}
?>
                </ul>
            </li>
        <?php }?>
    </ul>
</nav>
<?php }
}
