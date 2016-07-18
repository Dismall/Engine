{include file='head.tpl'}
    {if $is_auth}
        {include file='admin/menu.tpl'}
        {include file='admin/index.tpl'}
    {else}
        {include file='admin/authForm.tpl'}
    {/if}
{include file='footer.tpl'}
