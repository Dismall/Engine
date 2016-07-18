{include file='head.tpl'}
{include file='admin/menu.tpl'}
Выбран модуль: {$module}
{include file='admin/modules/'|cat:$module|cat:'.tpl'}
{include file='footer.tpl'}
