{if !$articles}
    <h3>Статей нету</h3>
{else}
    {foreach from=$articles item=article key=k}
        <article>
            {if !$article->show}<h2>СКРЫТО</h2>{/if}
            <h3>{$article->title}</h3>
            <p>{$article->text}</p>
            <h4>Автор - {$article->author}, Дата: {$article->date}</h4>
            <h4>Теги: {$article->tags} </h4>
            <button onclick="location.href='/admin/modules/article/edit/{$article->id}'">Редактировать</button>
            <button onclick="if(confirm('Вы действительно хотите удалить статью?')) location.href='/admin/modules/article/delete/{$article->id}'">Удалить</button>
        </article>
    {/foreach}
    {if $smarty.get.ssf > 0}
        {assign var="back" value=$smarty.get.ssf-1}
        {assign var="forward" value=$smarty.get.ssf+1}
    {/if}
    <button type="button" onclick="location.href='/admin/modules/article/{$back}'" {if !$back}disabled{/if}>Назад</button>
    <button type="button" onclick="location.href='/admin/modules/article/{$forward}'" {if !$forward}disabled{/if}>Вперед</button>
{/if}
