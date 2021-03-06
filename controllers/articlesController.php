<?php
namespace controllers;

use models\modules\ArticleModel;
use lib\mainFunctions;
use lib\DataBase;

class articlesController implements IController {
    public function indexAction() {
        $this->pageAction();
    }
    public function errorAction() {

    }

    public function pageAction() {
        $articleClass = new ArticleModel(); //Создаем экземпляр класса

        $offset = 0;
        if(isset($_GET['sf']) && intval($_GET['sf']) > 0) $offset = (intval($_GET['sf']) - 1) * ArticlesDefaultCount;

        $articles = $articleClass->getNews(true, $offset); //Получаем статьи

        $mainf = mainFunctions::getInstance();
        $smarty = $mainf->getSmarty();
        //$mainF->d($articles, false);
        //Объявляем переменные Smarty
        $smarty->assign('pageTitle', 'Статьи');
        $smarty->assign('articles', $articles);
        $smarty->assign('status', DataBase::getInstance()->getStatus());

        //Формируем страницу
        $mainf->loadTemplate('index');
    }
}
