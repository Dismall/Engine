<?php
/* Smarty version 3.1.29, created on 2016-07-19 19:01:16
  from "W:\domains\Engine\views\default\admin\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578e4ecc75d506_28188306',
  'file_dependency' => 
  array (
    '93632323190931f7750f95dafbb8b8532cfe7883' => 
    array (
      0 => 'W:\\domains\\Engine\\views\\default\\admin\\index.tpl',
      1 => 1468609972,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578e4ecc75d506_28188306 ($_smarty_tpl) {
?>
Логин: <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
 <br>
ID: <?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
 <br>
Хеш: <?php echo $_smarty_tpl->tpl_vars['userHash']->value;?>
 <br>
Группа: <?php echo $_smarty_tpl->tpl_vars['userRole']->value;?>
 <br>
<?php }
}
