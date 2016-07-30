<?php
/* Smarty version 3.1.29, created on 2016-07-19 19:01:27
  from "W:\domains\Engine\views\default\admin\modules\articles\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578e4ed7be0873_55065507',
  'file_dependency' => 
  array (
    'a5550906d7490ac9d7a606d5754703449f6295b1' => 
    array (
      0 => 'W:\\domains\\Engine\\views\\default\\admin\\modules\\articles\\add.tpl',
      1 => 1468795574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578e4ed7be0873_55065507 ($_smarty_tpl) {
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
<form method="post" action="/admin/modules/articles/save">
    <input class="wmax" name="title" type="text" placeholder="Заголовок" required="true">
    <textarea id="articleText" name="articleText" placeholder="Текст статьи" required="true"></textarea>
    <label><input class="inline" name="visiable" type="checkbox" checked="true">Показывать статью?</label>
    <input class="wmax input_select" name="author" list="users" required="true" placeholder="Выберите пользователя">
    <datalist id="users">
        <option value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">
    </datalist>
    <button class="btn" type="submit" onclick="javascript: tinymce.triggerSave();">Сохранить</button>
</form>
<?php }
}
