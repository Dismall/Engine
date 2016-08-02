<?php
    //Общие
    define('SiteName', "Site.ru");

    //Константы путей
    define('SEPARATOR', "\\");
    define('DIR', dirname(__DIR__));
    define('PathPrefix', DIR . SEPARATOR . 'controllers' . SEPARATOR);
    define('PathModulesPrefix', DIR . SEPARATOR . 'controllers' . SEPARATOR . 'modules' . SEPARATOR);
    define('PathPostfix', 'Controller.php');
    define('EXT_PHP', '.php');

    //Константы Smarty
    $template = 'default'; //Шаблон

    define('TemplatePrefix', SEPARATOR . 'views' . SEPARATOR . $template . SEPARATOR);
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
    define('ARTICLES_DELETE_SUCCESS', "Статья успешно удалена!");
    define('ARTICLES_DELETE_ERROR', "Статья не найдена!");
    define('ARTICLES_UPDATE_ERROR', 'Не обработан запрос');
    define('ARTICLES_UPDATE_SUCCESS', "Статья успешно обновлена!");
    define('ARTICLES_ADD_SUCCESS', "Статья успешно добавлена!");

    define('ARTICLES_EMPTYPARAM', "Значение не определено!");
    define('ARTICLES_USER_NOTFOUND', "Пользователь не найден!");

    define('ADMIN_AUTH_ERROR', 'Вы ввели неверный логин или пароль. Возможно ваш аккаунт заблокирован.');
    define('ADMIN_AUTH_NORIGHTS', 'У вас нет доступа!');
    define('ADMIN_ACCESS', array('Admin'));
    define('ADMIN_ERROR_NOTFOUND', '404');
