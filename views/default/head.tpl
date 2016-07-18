<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>{$pageTitle}</title>
        {foreach from=$stylesheet item=media key=css}
            <link rel="stylesheet" href="{$templatePath}css/{$css}.css" media="({$media})" type="text/css"/>
        {/foreach}
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    </head>
    <body class="main-font">
        <div class="main_wrapper">
