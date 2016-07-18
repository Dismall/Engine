{include file='head.tpl'}
<h1>{$pageTitle}</h1>

{$templatePath}
{$status}

{if !$articles}
    <h3>Статей нету</h3>
{else}
    {foreach from=$articles item=article key=k}
        <article>
            <h3>{$article->title}</h3>
            <p>{$article->text}</p>
            <h4>Автор - {$article->author}, Дата: {$article->date}</h4>
            <h4>Теги: {$article->tags} </h4>
        </article>
    {/foreach}
{/if}

{include file='footer.tpl'}
