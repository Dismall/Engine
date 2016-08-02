<?php
namespace controllers;

use lib\mainFunctions;
use models\AdminModel;
use classes\Account;

class adminController implements IController {
    public function testAction() {
        echo 'indexController.php -> testAction';

        return null;
    }

    public function indexAction() {
        $ap = new AdminModel();

        $mainf = mainFunctions::getInstance();
        $smarty = $mainf->getSmarty();

        $smarty->assign('is_auth', $ap->isAuthenticated());
        $smarty->assign('stylesheet', array_merge(
                                            $smarty->tpl_vars['stylesheet']->value,
                                            array(
                                                "admin_desktop" => "min-width: 1000.1px",
                                                "admin_mobile" => "max-width: 1000px"
                                            )));
        $smarty->assign('username', $ap->user);
        $smarty->assign('userID', $ap->userID);
        $smarty->assign('userRole', $ap->right);
        $smarty->assign('userHash', $_SESSION['userHash']);

        //Формируем страницу
        $mainf->loadTemplate('admin');
    }

    public function authAction() {
        $user = $_POST['username'];
        $password = $_POST['password'];

        $mainf = mainFunctions::getInstance();
        $smarty = $mainf->getSmarty();

        $account = Account::getInstance();
        $auth = $account->Auth($user, $password);
        if(!$account->isAdmin())
            $smarty->assign('error_message', 'Доступ запрещен!');
        else
            $smarty->assign(($auth['success'] ? 'success' : 'error') . '_message', $auth['message']);

        $this->indexAction();
    }

    public function logoutAction() {
        session_start();

        if(isset($_SESSION['userID']) || isset($_SESSION['userHash']))
        {
            unset($_SESSION['userID']);
            unset($_SESSION['userHash']);
        }

        header("Location: /admin");
        exit();
    }

    public function errorAction() {
        $mainf = mainFunctions::getInstance();
        $smarty = $mainf->getSmarty();
        //Объявляем переменные Smarty
        $smarty->assign('pageTitle', SiteName . ' - 404');
        $smarty->assign('error_message', SiteName . ' - 404');
        //Формируем страницу
        $mainf->loadTemplate('error');
        exit();
    }

    public function modulesAction() {
        $ap = new AdminModel();

        if(!$ap->isAuthenticated()) $this->backToMain();

        $mainf = mainFunctions::getInstance();
        $smarty = $mainf->getSmarty();

        $smarty->assign('stylesheet', array_merge(
                                            $smarty->tpl_vars['stylesheet']->value,
                                            array(
                                                "admin_desktop" => "min-width: 1000.1px",
                                                "admin_mobile" => "max-width: 1000px"
                                            )));
        if(isset($_GET['sf']))
        {
            $controller = strtolower($_GET['sf']);

            if(file_exists(PathModulesPrefix . $controller . PathPostfix) && file_exists(DIR . TemplatePrefix . "admin" . SEPARATOR . "modules" . SEPARATOR . $controller . TemplatePostfix))
            {
                //require_once(PathModulesPrefix . $controller . PathPostfix);

                $ssf = isset($_GET['ssf']) ?
                            (file_exists(DIR . TemplatePrefix . "admin" . SEPARATOR . "modules" . SEPARATOR . $controller . SEPARATOR . $_GET['ssf'] . TemplatePostfix) ? $_GET['ssf'] : 'index') : 'index';


                $class = 'controllers\\modules\\'. $controller . 'Controller';
                $articles = new $class();

                if(method_exists($articles, $ssf . 'Action'))
                {
                    $f = $ssf . 'Action';
                    $articles->$f();
                }

                $smarty->assign('action', $ssf);
                $smarty->assign('module', $controller);
                $smarty->assign('username', $ap->user);

                $mainf->loadTemplate('admin/module');

                return;
            }
        }

        //Формируем страницу
        $mainf->loadTemplate('admin/modules');
    }

    private function callModule($controller, $ssf) {

    }

    public function backToMain() {
        header("Location: /admin");
        exit();
    }
}
