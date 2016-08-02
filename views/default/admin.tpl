{include file='head.tpl'}
    {if $is_auth}
        {include file='admin/menu.tpl'}
        {if $success_message}<div class="alert alert-success fadeOut">{$success_message}</div>{/if}
        {include file='admin/index.tpl'}
    {else}
        {if $error_message}<div class="alert alert-error">Ошибка: {$error_message}</div>{/if}
        {include file='admin/authForm.tpl'}
    {/if}
{include file='footer.tpl'}
