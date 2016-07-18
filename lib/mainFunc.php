<?php
interface ImainFunctions {
    public function loadPage($controller, $action = 'index');
    public function loadSmarty();
    public function loadTemplate($tpl = 'index');
    public function d($debug, $die = true);
    public function DSmarty($die = true);
}

class mainFunctions implements ImainFunctions {
    public function loadPage($controller, $action = 'index') {
        if(!file_exists(PathPrefix . $controller . PathPostfix)) $controller = 'index' AND $action = "error";

        include_once PathPrefix . $controller . PathPostfix;

        $f = $action . "Action";

        if(!function_exists($f)) $f = 'errorAction';

        $tpl = $f($GLOBALS['smarty'], $GLOBALS['mainFunc']);
    }

    public function loadSmarty() {
        global $smarty;
        $smarty = new Smarty();

        $smarty->setTemplateDir(TemplatePrefix);
        $smarty->setCompileDir('/tmp/Smarty/templates_c');
        $smarty->setCacheDir('/tmp/Smarty/cache');
        $smarty->setConfigDir('/lib/Smarty/configs');

        $smarty->assign('templatePath', TemplatePath);
        $smarty->assign('SiteName', SiteName);
        $smarty->assign('stylesheet', array(
                                        "main_desktop" => "min-width: 1000.1px",
                                        "main_mobile" => "max-width: 1000px"
                                    ));
        return $smarty;
    }

    public function loadTemplate($tpl = 'index') {
        $GLOBALS['smarty']->display($tpl . TemplatePostfix);
    }

    /**
     * DEBUG
     * @param  var $debug
     * @param  bool $die
     * @return null
     */
    public function d($debug, $die = true) {
        echo "<pre>";
        print_r($debug);
        echo "</pre>";

        if($die) die;
    }

    /**
     * DEBUG SMARTY
     * @param bool $die
     * @return null
     */
    public function DSmarty($die = true) {
        $this->d($globals['smarty'], $die);
    }
}
