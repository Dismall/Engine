<?php
/* Smarty version 3.1.29, created on 2016-07-23 16:02:02
  from "W:\domains\Engine\views\default\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57936aca05a9c8_97877295',
  'file_dependency' => 
  array (
    '4fcdcfd6c9b72bba6596d9925210b175dfbf8545' => 
    array (
      0 => 'W:\\domains\\Engine\\views\\default\\index.tpl',
      1 => 1469278908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_57936aca05a9c8_97877295 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h1>

<?php echo $_smarty_tpl->tpl_vars['templatePath']->value;?>

<?php echo $_smarty_tpl->tpl_vars['status']->value;?>


<?php if ($_GET['sf'] > 0) {?>
    <?php $_smarty_tpl->tpl_vars["back"] = new Smarty_Variable($_GET['sf']-1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "back", 0);?>
    <?php $_smarty_tpl->tpl_vars["forward"] = new Smarty_Variable($_GET['sf']+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "forward", 0);
} else { ?>
    <?php $_smarty_tpl->tpl_vars["forward"] = new Smarty_Variable(2, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "forward", 0);
}?>

<?php if (!$_smarty_tpl->tpl_vars['articles']->value) {?>
    <h3>Статей нету</h3>
    <button type="button" onclick="location.href='/articles/page/<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
'" <?php if (!$_smarty_tpl->tpl_vars['back']->value) {?>disabled<?php }?>>Назад</button>
<?php } else { ?>
    <?php
$_from = $_smarty_tpl->tpl_vars['articles']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_article_0_saved_item = isset($_smarty_tpl->tpl_vars['article']) ? $_smarty_tpl->tpl_vars['article'] : false;
$__foreach_article_0_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['article'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['article']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
$__foreach_article_0_saved_local_item = $_smarty_tpl->tpl_vars['article'];
?>
        <article>
            <h3><?php echo $_smarty_tpl->tpl_vars['article']->value->title;?>
</h3>
            <p><?php echo $_smarty_tpl->tpl_vars['article']->value->text;?>
</p>
            <h4>Автор - <?php echo $_smarty_tpl->tpl_vars['article']->value->author;?>
, Дата: <?php echo $_smarty_tpl->tpl_vars['article']->value->date;?>
</h4>
            <h4>Теги: <?php echo $_smarty_tpl->tpl_vars['article']->value->tags;?>
 </h4>
        </article>
    <?php
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_0_saved_local_item;
}
if ($__foreach_article_0_saved_item) {
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_0_saved_item;
}
if ($__foreach_article_0_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_article_0_saved_key;
}
?>
    <button type="button" onclick="location.href='/articles/page/<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
'">Назад</button>
    <button type="button" onclick="location.href='/articles/page/<?php echo $_smarty_tpl->tpl_vars['forward']->value;?>
'">Вперед</button>
<?php }?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
