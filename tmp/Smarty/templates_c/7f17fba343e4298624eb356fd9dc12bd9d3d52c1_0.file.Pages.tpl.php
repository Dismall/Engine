<?php
/* Smarty version 3.1.29, created on 2016-07-23 16:15:39
  from "W:\domains\Engine\views\default\admin\modules\Pages.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57936dfbf01a24_65801598',
  'file_dependency' => 
  array (
    '7f17fba343e4298624eb356fd9dc12bd9d3d52c1' => 
    array (
      0 => 'W:\\domains\\Engine\\views\\default\\admin\\modules\\Pages.tpl',
      1 => 1469279291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57936dfbf01a24_65801598 ($_smarty_tpl) {
?>
<br>
Имя модуля: <?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
 <br>
Действие: <?php echo $_smarty_tpl->tpl_vars['action']->value;?>
 <br>
<?php if ($_smarty_tpl->tpl_vars['message']->value) {?>Ответ: <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
 <br> <?php }
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, (('admin/modules/pages/').($_smarty_tpl->tpl_vars['action']->value)).('.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
