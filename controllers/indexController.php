<?php /* Формирование главной страницы и 404 */

require_once("/models/modules/articlesModel.php"); //Подключаем набор функций статей

/**
 * Тестовый метод
 * @return null
 */
function testAction() {
    echo 'indexController.php -> testAction';

    return null;
}

/**
 * Метод, формирующий главную страницу
 * @param  Smarty $smarty
 * @param  MainFunctions $mainF
 * @return null
 */
function indexAction($smarty, ImainFunctions $mainF) {
    $articleClass = new News(); //Создаем экземпляр класса
    $articles = $articleClass->getNews(); //Получаем статьи

    //$mainF->d($articles, false);
    //Объявляем переменные Smarty
    $smarty->assign('pageTitle', 'Главная');
    $smarty->assign('articles', $articles);
    $smarty->assign('status', $GLOBALS['db']->getStatus());

    //Формируем страницу
    $mainF->loadTemplate('index');
}

/**
 * Метод, формирующий 404
 * @param  Smarty $smarty
 * @param  MainFunctions $mainF
 * @return null
 */
function errorAction($smarty, ImainFunctions $mainF) {
    //Объявляем переменные Smarty
    $smarty->assign('pageTitle', SiteName . ' - 404');

    //Формируем страницу
    $mainF->loadTemplate('error');
}
