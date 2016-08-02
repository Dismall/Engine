<nav>
    <ul class="menu">
        <li><a href="/admin">Главная</a></li>
        <li>
            <a href="/admin/modules">Модули</a>
            <ul class="submenu">
                <li><a href="/admin/modules/article">Статьи</a></li>
                <li><a href="/admin/modules/page">Страницы</a></li>
            </ul>
        </li>
        <li><a href="/admin/me">Аккаунт</a></li>
        <li>
            <a href="/admin/settings">Настройки</a>
            <ul class="submenu">
                <li><a href="/admin/personal">Пользователи</a></li>
                <li><a href="/admin/theme">Тема</a></li>
                <li><a href="/admin/basic">Общие настройки</a></li>
            </ul>
        </li>
        <li><a href="/admin/logout">Выход</a></li>
        {if $module_actions}
            <li class="flr">
                <a href="/admin/modules/{$module}">{$module_name}</a>
                <ul class="rsubmenu">
                    {foreach from=$module_actions item=action key=action_name}
                        <li><a href="/admin/modules/{$module}/{$action}">{$action_name}</a></li>
                    {/foreach}
                </ul>
            </li>
        {/if}
    </ul>
</nav>
