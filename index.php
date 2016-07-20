<?php
    //Подключение библиотек
    include_once("/config/config.php"); //Конфигурация
    include_once("/models/DBModel.php"); //База данных
    include_once("/lib/mainFunc.php"); //Основные функции
    include_once("/lib/Smarty/libs/Smarty.class.php"); //Smarty

    //Определение страницы и метода
    $page = isset($_GET['p']) ? mb_strtolower($_GET['p']) : "index"; //Страница
    $func = isset($_GET['f']) ? mb_strtolower($_GET['f']) : "index"; //Метод
    if(empty($page)) $page = "index";

    //Создание экзепляров: основных функций и базы данных
    $mainFunc = new mainFunctions();
    $db = new DB();

    //Формирование страницы
    $mainFunc->loadSmarty(); //Инициализация Smarty
    $mainFunc->loadPage($page, $func); //Загрузка страницы

    //$mainFunc->d($db->getStatus());
    //$mainFunc->DSmarty();
