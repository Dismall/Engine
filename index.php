<?php
require_once(dirname(__FILE__) . "/config/config.php");
require_once(DIR . "/lib/Logger.php");
require_once(DIR . "/lib/Smarty/libs/Smarty.class.php");
require_once(DIR . "/lib/Loader.php");

spl_autoload_register(['\lib\Loader', 'loadClass']);

use lib\mainFunctions;
use lib\DataBase;
use lib\Logger;


//Определение страницы и метода
$page = isset($_GET['p']) ? mb_strtolower($_GET['p']) : "index"; //Страница
$func = isset($_GET['f']) ? mb_strtolower($_GET['f']) : "index"; //Метод
if(empty($page)) $page = "index";

//Создание экзепляров: основных функций и базы данных
$mainFunc = mainFunctions::getInstance();
$db = DataBase::getInstance();

//Формирование страницы
$mainFunc->loadSmarty(); //Инициализация Smarty
$mainFunc->loadPage($page, $func); //Загрузка страницы

//$mainFunc->d($db->getStatus());
//$mainFunc->DSmarty();
