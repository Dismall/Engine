<?php /* Формирование главной страницы и 404 */
require_once(PathPrefix . "IControllerInterface.php");
require_once(PathPrefix . "articles" . PathPostfix);

class indexController extends articlesController implements IController {
    public function indexAction($smarty, ImainFunctions $mainF) {
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
