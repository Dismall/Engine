{include file='head.tpl'}
<h1>{$pageTitle}</h1>

{$templatePath}
{$status}

{if $smarty.get.sf > 0}
    {assign var="back" value=$smarty.get.sf-1}
    {assign var="forward" value=$smarty.get.sf+1}
{else}
    {assign var="forward" value=2}
{/if}

{if !$articles}
    <h3>Статей нету</h3>
    <button type="button" onclick="location.href='/articles/page/{$back}'" {if !$back}disabled{/if}>Назад</button>
{else}
    {foreach from=$articles item=article key=k}
        <article>
            <h3>{$article->title}</h3>
            <p>{$article->text}</p>
            <h4>Автор - {$article->author}, Дата: {$article->date}</h4>
            <h4>Теги: {$article->tags} </h4>
        </article>
    {/foreach}
    <button type="button" onclick="location.href='/articles/page/{$back}'">Назад</button>
    <button type="button" onclick="location.href='/articles/page/{$forward}'">Вперед</button>
{/if}

{include file='footer.tpl'}
