<?php
/* Smarty version 3.1.29, created on 2016-07-19 17:02:21
  from "W:\domains\Engine\views\default\head.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578e32ed8ae798_23367272',
  'file_dependency' => 
  array (
    'afda723f61e5507180144e752b8487e85d6531fe' => 
    array (
      0 => 'W:\\domains\\Engine\\views\\default\\head.tpl',
      1 => 1468611869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578e32ed8ae798_23367272 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <?php
$_from = $_smarty_tpl->tpl_vars['stylesheet']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_media_0_saved_item = isset($_smarty_tpl->tpl_vars['media']) ? $_smarty_tpl->tpl_vars['media'] : false;
$__foreach_media_0_saved_key = isset($_smarty_tpl->tpl_vars['css']) ? $_smarty_tpl->tpl_vars['css'] : false;
$_smarty_tpl->tpl_vars['media'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['css'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['media']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['css']->value => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->_loop = true;
$__foreach_media_0_saved_local_item = $_smarty_tpl->tpl_vars['media'];
?>
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>
css/<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
.css" media="(<?php echo $_smarty_tpl->tpl_vars['media']->value;?>
)" type="text/css"/>
        <?php
$_smarty_tpl->tpl_vars['media'] = $__foreach_media_0_saved_local_item;
}
if ($__foreach_media_0_saved_item) {
$_smarty_tpl->tpl_vars['media'] = $__foreach_media_0_saved_item;
}
if ($__foreach_media_0_saved_key) {
$_smarty_tpl->tpl_vars['css'] = $__foreach_media_0_saved_key;
}
?>
        <?php echo '<script'; ?>
 src="//cdn.tinymce.com/4/tinymce.min.js"><?php echo '</script'; ?>
>
    </head>
    <body class="main-font">
        <div class="main_wrapper">
<?php }
}
