<?php
/* Smarty version 3.1.29, created on 2016-07-19 17:02:22
  from "W:\domains\Engine\views\default\error.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578e32ee0ec7e3_51758482',
  'file_dependency' => 
  array (
    'ec1de93b82534e8d20af63f732efbaa6f5bbb51b' => 
    array (
      0 => 'W:\\domains\\Engine\\views\\default\\error.tpl',
      1 => 1468525845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_578e32ee0ec7e3_51758482 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <p class="alert alert-error"><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
</p>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
