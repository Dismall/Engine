<?php
/* Smarty version 3.1.29, created on 2016-07-19 23:07:24
  from "W:\domains\Engine\views\default\admin\modules\articles\edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578e887c650c49_61382881',
  'file_dependency' => 
  array (
    '19a1808a573c4fdb98884569a19a9eab21bcb1d1' => 
    array (
      0 => 'W:\\domains\\Engine\\views\\default\\admin\\modules\\articles\\edit.tpl',
      1 => 1468795808,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578e887c650c49_61382881 ($_smarty_tpl) {
echo '<script'; ?>
>tinymce.init({
    selector:'#articleText',
    plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor blockquote | fontsizeselect fontselect removeformat',
    style_formats: [
    { title: 'Bold text', inline: 'strong' },
    { title: 'Red text', inline: 'span', styles: { color: '#ff0000' } },
    { title: 'Red header', block: 'h1', styles: { color: '#ff0000' } },
    { title: 'Badge', inline: 'span', styles: { display: 'inline-block', border: '1px solid #2276d2', 'border-radius': '5px', padding: '2px 5px', margin: '0 2px', color: '#2276d2' } },
    { title: 'Table row 1', selector: 'tr', classes: 'tablerow1' },
    { title: 'Vertical line', selector: 'blockquote', styles: {paddingLeft: '5px', borderLeft: '5px solid #CCC'} }
    ]
});<?php echo '</script'; ?>
>
<form method="post" action="/admin/modules/articles/update/<?php echo $_smarty_tpl->tpl_vars['article']->value->id;?>
">
    <input class="wmax" name="title" type="text" placeholder="Заголовок" required="true" value="<?php echo $_smarty_tpl->tpl_vars['article']->value->title;?>
">
    <textarea id="articleText" name="articleText" placeholder="Текст статьи" required="true"><?php echo $_smarty_tpl->tpl_vars['article']->value->text;?>
</textarea>
    <label><input class="inline" name="visiable" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['article']->value->show) {?>checked<?php }?>>Показывать статью?</label>
    <input class="wmax input_select" name="author" list="users" required="true" placeholder="Выберите пользователя" value="<?php echo $_smarty_tpl->tpl_vars['article']->value->author;?>
">
    <datalist id="users">
        <option value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">
    </datalist>
    <button class="btn" type="submit" onclick="javascript: tinymce.triggerSave();">Сохранить</button>
</form>
<?php }
}
