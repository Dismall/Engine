<?php
namespace controllers;

use lib\mainFunctions;

class indexController extends articlesController implements IController {
    public function indexAction() {
        parent::indexAction();
    }

    public function errorAction() {
        $mf = mainFunctions::getInstance();
        $smarty = $mf->getSmarty();
        //Объявляем переменные Smarty
        $smarty->assign('pageTitle', SiteName . ' - 404');
        $smarty->assign('error_message', SiteName . ' - 404');
        //Формируем страницу
        $mf->loadTemplate('error');
    }
}
