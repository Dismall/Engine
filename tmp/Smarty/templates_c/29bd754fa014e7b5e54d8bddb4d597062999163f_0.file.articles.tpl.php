<?php
/* Smarty version 3.1.29, created on 2016-07-19 19:01:19
  from "W:\domains\Engine\views\default\admin\modules\articles.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578e4ecfcd9e12_72939995',
  'file_dependency' => 
  array (
    '29bd754fa014e7b5e54d8bddb4d597062999163f' => 
    array (
      0 => 'W:\\domains\\Engine\\views\\default\\admin\\modules\\articles.tpl',
      1 => 1468789632,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578e4ecfcd9e12_72939995 ($_smarty_tpl) {
?>
<br>
Имя модуля: <?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
 <br>
Действие: <?php echo $_smarty_tpl->tpl_vars['action']->value;?>
 <br>
<?php if ($_smarty_tpl->tpl_vars['message']->value) {?>Ответ: <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
 <br> <?php }
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, (('admin/modules/articles/').($_smarty_tpl->tpl_vars['action']->value)).('.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
