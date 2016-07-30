<?php
/* Smarty version 3.1.29, created on 2016-07-20 22:10:53
  from "W:\domains\Engine\views\default\admin\modules\articles\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578fccbdb87600_52630753',
  'file_dependency' => 
  array (
    'ea15ad3466fe6dfca3f6dd122f6e02779b0b71d4' => 
    array (
      0 => 'W:\\domains\\Engine\\views\\default\\admin\\modules\\articles\\index.tpl',
      1 => 1469041851,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578fccbdb87600_52630753 ($_smarty_tpl) {
if (!$_smarty_tpl->tpl_vars['articles']->value) {?>
    <h3>Статей нету</h3>
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
            <?php if (!$_smarty_tpl->tpl_vars['article']->value->show) {?><h2>СКРЫТО</h2><?php }?>
            <h3><?php echo $_smarty_tpl->tpl_vars['article']->value->title;?>
</h3>
            <p><?php echo $_smarty_tpl->tpl_vars['article']->value->text;?>
</p>
            <h4>Автор - <?php echo $_smarty_tpl->tpl_vars['article']->value->author;?>
, Дата: <?php echo $_smarty_tpl->tpl_vars['article']->value->date;?>
</h4>
            <h4>Теги: <?php echo $_smarty_tpl->tpl_vars['article']->value->tags;?>
 </h4>
            <button onclick="location.href='/admin/modules/articles/edit/<?php echo $_smarty_tpl->tpl_vars['article']->value->id;?>
'">Редактировать</button>
            <button onclick="if(confirm('Вы действительно хотите удалить статью?')) location.href='/admin/modules/articles/delete/<?php echo $_smarty_tpl->tpl_vars['article']->value->id;?>
'">Удалить</button>
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
    <?php if ($_GET['ssf'] > 0) {?>
        <?php $_smarty_tpl->tpl_vars["back"] = new Smarty_Variable($_GET['ssf']-1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "back", 0);?>
        <?php $_smarty_tpl->tpl_vars["forward"] = new Smarty_Variable($_GET['ssf']+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "forward", 0);?>
    <?php }?>
    <button type="button" onclick="location.href='/admin/modules/articles/<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
'" <?php if (!$_smarty_tpl->tpl_vars['back']->value) {?>disabled<?php }?>>Назад</button>
    <button type="button" onclick="location.href='/admin/modules/articles/<?php echo $_smarty_tpl->tpl_vars['forward']->value;?>
'" <?php if (!$_smarty_tpl->tpl_vars['forward']->value) {?>disabled<?php }?>>Вперед</button>
<?php }
}
}
