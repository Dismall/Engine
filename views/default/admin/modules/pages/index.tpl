{if !$pages}
    <h3>Страниц нет</h3>
{else}
    {foreach from=$pages item=page key=k}
        <article>
            <h3>{$page->title}</h3>
            {if $page->css}
                <p>
                    Стили:
                    {foreach from=$page->css item=css}
                        <br> - {$css}
                    {/foreach}
                </p>
            {/if}
            {if $page->js}
                <p>
                    Скрипты:
                    {foreach from=$page->js item=js}
                        <br> - {$js}
                    {/foreach}
                </p>
            {/if}
            <p>
                {foreach from=$page->body item=body}
                    <textarea class="htmlText" readonly>
                        {include file=$templatePath|cat:'pages/'|cat:$body}
                    </textarea>
                {/foreach}
            </p>
            <h4>Автор - , Дата: </h4>
            <button onclick="location.href='/admin/modules/pages/edit/{$article->id}'">Редактировать</button>
            <button onclick="if(confirm('Вы действительно хотите удалить страницу?')) location.href='/admin/modules/pages/delete/{$article->id}'">Удалить</button>
        </article>
    {/foreach}
    {if $smarty.get.ssf > 0}
        {assign var="back" value=$smarty.get.ssf-1}
        {assign var="forward" value=$smarty.get.ssf+1}
    {/if}
    <button type="button" onclick="location.href='/admin/modules/pages/{$back}'" {if !$back}disabled{/if}>Назад</button>
    <button type="button" onclick="location.href='/admin/modules/pages/{$forward}'" {if !$forward}disabled{/if}>Вперед</button>
{/if}
