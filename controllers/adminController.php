<?php
require_once(PathPrefix . "IControllerInterface.php");
require_once(Dir . '/models/AdminModel.php');

class adminController implements IController {
    public function testAction() {
        echo 'indexController.php -> testAction';

        return null;
    }

    public function indexAction() {
        $ap = new AdminPanel();

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
        $ap = new AdminPanel();

        $user = $_POST['username'];
        $password = $_POST['password'];

        $mainf = mainFunctions::getInstance();
        $smarty = $mainf->getSmarty();

        if($ap->isAuthenticated() || $ap->auth($user, $password))
        {
            if(!$ap->canEnter())
            {
                $smarty->assign('error_message', ADMIN_AUTH_NORIGHTS);
                $mainf->loadTemplate('error');
                return;
            }

            header("Location: /admin");
            exit();
        }

        $smarty->assign('error_message', ADMIN_AUTH_ERROR);

        $mainf->loadTemplate('error');
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
        $ap = new AdminPanel();

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
            $controller = $_GET['sf'];
            if(file_exists(PathModulesPrefix . $controller . PathPostfix) && file_exists(Dir . TemplatePrefix . "admin" . Separator . "modules" . Separator . $controller . TemplatePostfix))
            {
                require_once(PathModulesPrefix . $controller . PathPostfix);

                $ssf = isset($_GET['ssf']) ?
                            (file_exists(Dir . TemplatePrefix . "admin" . Separator . "modules" . Separator . $controller . Separator . $_GET['ssf'] . TemplatePostfix) ? $_GET['ssf'] : 'index') : 'index';

                $controller = ucfirst($controller);
                $articles = new $controller();
                $controller = strtolower($controller);

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

    public function backToMain() {
        header("Location: /admin");
        exit();
    }
}
