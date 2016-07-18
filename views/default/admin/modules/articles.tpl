<br>
Имя модуля: {$module_name} <br>
Действие: {$action} <br>
{if $message}Ответ: {$message} <br> {/if}
{include file='admin/modules/articles/'|cat:$action|cat:'.tpl'}
