<br>
Имя модуля: {$module_name} <br>
Действие: {$action} <br>
{if $message}Ответ: {$message} <br> {/if}
{if $error_message}<div class="alert alert-error">Ошибка: {$error_message}</div>{/if}
{if $success_message}<div class="alert alert-success">{$success_message}</div>{/if}
{include file='admin/modules/pages/'|cat:$action|cat:'.tpl'}
