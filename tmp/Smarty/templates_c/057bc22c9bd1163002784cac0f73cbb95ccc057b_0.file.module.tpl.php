<?php
/* Smarty version 3.1.29, created on 2016-07-19 19:01:19
  from "W:\domains\Engine\views\default\admin\module.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578e4ecfcc1ae1_14935331',
  'file_dependency' => 
  array (
    '057bc22c9bd1163002784cac0f73cbb95ccc057b' => 
    array (
      0 => 'W:\\domains\\Engine\\views\\default\\admin\\module.tpl',
      1 => 1468789236,
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
function content_578e4ecfcc1ae1_14935331 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

Выбран модуль: <?php echo $_smarty_tpl->tpl_vars['module']->value;?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, (('admin/modules/').($_smarty_tpl->tpl_vars['module']->value)).('.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
