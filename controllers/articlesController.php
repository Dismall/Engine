<?php
require_once(PathPrefix . "IControllerInterface.php");
require_once("/models/modules/articlesModel.php"); //Подключаем набор функций статей

class articlesController implements IController{
    public function indexAction($smarty, ImainFunctions $mainF) {
        $this->pageAction($smarty, $mainF);
    }
    public function errorAction($smarty, ImainFunctions $mainF) {

    }

    public function pageAction($smarty, ImainFunctions $mainF) {
        $articleClass = new News(); //Создаем экземпляр класса

        $offset = 0;
        if(isset($_GET['sf']) && intval($_GET['sf']) > 0) $offset = (intval($_GET['sf']) - 1) * ArticlesDefaultCount;

        $articles = $articleClass->getNews(true, $offset); //Получаем статьи

        //$mainF->d($articles, false);
        //Объявляем переменные Smarty
        $smarty->assign('pageTitle', 'Статьи');
        $smarty->assign('articles', $articles);
        $smarty->assign('status', $GLOBALS['db']->getStatus());

        //Формируем страницу
        $mainF->loadTemplate('index');
    }
}
