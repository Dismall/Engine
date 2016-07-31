<?php
require_once(PathPrefix . "IControllerInterface.php");
require_once(PathPrefix . "index" . PathPostfix);
require_once(Dir . "/models/modules/pagesModel.php");

class pageController extends indexController implements IController {
    public function indexAction($smarty, ImainFunctions $mainF) {
        if(isset($_GET['id']))
        {
            $pm = new PageModel();
            $result = $pm->getPageByID(intval($_GET['id']));
            //Объявляем переменные Smarty
            $smarty->assign('pageTitle', SiteName . " | " . $result->title);
            $smarty->assign('pageContent', $result);
            if(isset($result->css))
                $smarty->assign('stylesheet', array_merge($smarty->tpl_vars['stylesheet']->value, array_fill_keys($result->css, "")));

            //Формируем страницу
            $mainF->loadTemplate('page');
            return;
        }

        parent::indexAction($smarty, $mainF);
    }

    public function errorAction($smarty, ImainFunctions $mainF) {
        //Объявляем переменные Smarty
        $smarty->assign('pageTitle', SiteName . ' - 404');
        $smarty->assign('error_message', SiteName . ' - 404');

        //Формируем страницу
        $mainF->loadTemplate('error');
    }
}
