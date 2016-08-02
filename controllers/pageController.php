<?php
namespace controllers;

use models\modules\PageModel;

class pageController extends indexController implements IController {
    public function indexAction() {
        if(isset($_GET['id']))
        {
            $pm = new PageModel();
            $result = $pm->getPageByID(intval($_GET['id']));

            $mainf = mainFunctions::getInstance();
            $smarty = $mainf->getSmarty();

            $smarty->assign('pageTitle', SiteName . " | " . $result->title);
            $smarty->assign('pageContent', $result);
            if(isset($result->css))
                $smarty->assign('stylesheet', array_merge($smarty->tpl_vars['stylesheet']->value, array_fill_keys($result->css, "")));

            //Формируем страницу
            $mainf->loadTemplate('page');
            return;
        }

        parent::indexAction();
    }

    public function errorAction() {
        $mainf = mainFunctions::getInstance();
        $smarty = $mainf->getSmarty();
        //Объявляем переменные Smarty
        $smarty->assign('pageTitle', SiteName . ' - 404');
        $smarty->assign('error_message', SiteName . ' - 404');

        //Формируем страницу
        $mainf->loadTemplate('error');
    }
}
