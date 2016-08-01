<?php
    //Подключение библиотек
    include_once(dirname(__FILE__) . "/config/config.php"); //Конфигурация
    include_once(Dir . "/models/DBModel.php"); //База данных
    include_once(Dir . "/lib/mainFunc.php"); //Основные функции
    include_once(Dir . "/lib/Smarty/libs/Smarty.class.php"); //Smarty

    //Определение страницы и метода
    $page = isset($_GET['p']) ? mb_strtolower($_GET['p']) : "index"; //Страница
    $func = isset($_GET['f']) ? mb_strtolower($_GET['f']) : "index"; //Метод
    if(empty($page)) $page = "index";

    //Создание экзепляров: основных функций и базы данных
    $mainFunc = mainFunctions::getInstance();
    $db = DB::getInstance();

    //Формирование страницы
    $mainFunc->loadSmarty(); //Инициализация Smarty
    $mainFunc->loadPage($page, $func); //Загрузка страницы

    //$mainFunc->d($db->getStatus());
    //$mainFunc->DSmarty();
