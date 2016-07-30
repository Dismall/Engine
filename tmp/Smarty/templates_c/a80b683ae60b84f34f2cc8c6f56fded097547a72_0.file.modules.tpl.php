<?php
/* Smarty version 3.1.29, created on 2016-07-19 19:01:23
  from "W:\domains\Engine\views\default\admin\modules.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578e4ed35c0ba4_31250731',
  'file_dependency' => 
  array (
    'a80b683ae60b84f34f2cc8c6f56fded097547a72' => 
    array (
      0 => 'W:\\domains\\Engine\\views\\default\\admin\\modules.tpl',
      1 => 1468606410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:admin/menu.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_578e4ed35c0ba4_31250731 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo $_smarty_tpl->tpl_vars['path']->value;?>

Установленные модули: <br>
- Статьи
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
