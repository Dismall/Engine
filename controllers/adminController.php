<?php
    require_once('/models/AdminModel.php');

    function testAction() {
        echo 'indexController.php -> testAction';

        return null;
    }

    function indexAction($smarty, ImainFunctions $mainF) {
        $ap = new AdminPanel();

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
        $mainF->loadTemplate('admin');
    }

    function authAction($smarty, ImainFunctions $mainF) {
        $ap = new AdminPanel();

        $user = $_POST['username'];
        $password = $_POST['password'];

        if($ap->isAuthenticated() || $ap->auth($user, $password))
        {
            if(!$ap->canEnter())
            {
                $smarty->assign('error_message', ADMIN_AUTH_NORIGHTS);
                $mainF->loadTemplate('error');
                return;
            }

            header("Location: /admin");
            exit();
        }

        $smarty->assign('error_message', ADMIN_AUTH_ERROR);

        $mainF->loadTemplate('error');
    }

    function logoutAction($smarty, ImainFunctions $mainF) {
        session_start();

        if(isset($_SESSION['userID']) || isset($_SESSION['userHash']))
        {
            unset($_SESSION['userID']);
            unset($_SESSION['userHash']);
        }

        header("Location: /admin");
        exit();
    }

    function errorAction($smarty, ImainFunctions $mainF) {
        //Объявляем переменные Smarty
        $smarty->assign('pageTitle', SiteName . ' - 404');

        //Формируем страницу
        $mainF->loadTemplate('error');
        exit();
    }

    function modulesAction($smarty, ImainFunctions $mainF) {
        $ap = new AdminPanel();

        $smarty->assign('is_auth', $ap->isAuthenticated());
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

                $articles = new Articles();
                if(method_exists($articles, $ssf . 'Action'))
                {
                    $f = $ssf . 'Action';
                    $articles->$f();
                }

                $smarty->assign('action', $ssf);
                $smarty->assign('module', $controller);
                $smarty->assign('username', $ap->user);

                $mainF->loadTemplate('admin/module');
                return;
            }
        }

        //Формируем страницу
        $mainF->loadTemplate('admin/modules');
    }
