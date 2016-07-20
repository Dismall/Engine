<?php
    //Общие
    define('SiteName', "Site.ru");

    //Константы путей
    define('Separator', "\\");
    define('Dir', dirname(__DIR__));
    define('PathPrefix', Dir . Separator . 'controllers' . Separator);
    define('PathModulesPrefix', Dir . Separator . 'controllers' . Separator . 'modules' . Separator);
    define('PathPostfix', 'Controller.php');

    //Константы Smarty
    $template = 'default'; //Шаблон

    define('TemplatePrefix', Separator . 'views' . Separator . $template . Separator);
    define('TemplatePostfix', '.tpl');
    define('TemplatePath', "/templates/{$template}/");

    //Константы базы данных
    define('DBHost', "192.168.1.200"); //Хост
    define('DBPort', "5432"); //Порт
    define('DBUser', "site"); //Пользователь
    define('DBPassword', "xeUTU#tb"); //Пароль
    define('DBDataBase', "engine"); //База данных
    define('DBSearchPath', "\"Main\"");
    define('DBCharset', "UTF-8"); //Кодировка

    //Константы для статей
    define('ArticlesDefaultCount', 5); //Кол-во выводимых статей на одной странице


    define('ADMIN_AUTH_ERROR', 'Вы ввели неверный логин или пароль. Возможно ваш аккаунт заблокирован.');
    define('ADMIN_AUTH_NORIGHTS', 'У вас нет доступа!');
    define('ADMIN_ACCESS', array('Admin'));
