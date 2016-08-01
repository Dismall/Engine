<?php
interface ImainFunctions {
    public function loadPage($controller, $action = 'index');
    public function loadSmarty();
    public function loadTemplate($tpl = 'index');
    public function d($debug, $die = true);
    public function DSmarty($die = true);
}

class mainFunctions implements ImainFunctions {
    private static $instance;
    private $smarty;

    public static function getInstance() {
        if(!isset(self::$instance))
            self::$instance = new mainFunctions();

        return self::$instance;
    }
    /**
     * Загрузка страницы
     * @param  string $controller
     * @param  string $action
     * @return void
     */
    public function loadPage($controller, $action = 'index') {
        if(!file_exists(PathPrefix . $controller . PathPostfix)) $controller = 'index' AND $action = "error";

        include_once PathPrefix . $controller . PathPostfix;

        $f = $action . "Action";
        $class = $controller . 'Controller';
        $class = new $class();
        if(!method_exists($class, $f)) $f = 'errorAction';

        $tpl = $class->$f();
    }

    public function loadSmarty() {
        $this->smarty = new Smarty();

        $this->smarty->setTemplateDir(TemplatePrefix);
        $this->smarty->setCompileDir('/tmp/Smarty/templates_c');
        $this->smarty->setCacheDir('/tmp/Smarty/cache');
        $this->smarty->setConfigDir('/lib/Smarty/configs');

        $this->smarty->assign('templatePath', TemplatePath);
        $this->smarty->assign('SiteName', SiteName);
        $this->smarty->assign('stylesheet', array(
                                        "main_desktop" => "min-width: 1000.1px",
                                        "main_mobile" => "max-width: 1000px"
                                    ));
        return $this->getSmarty();
    }

    public function loadTemplate($tpl = 'index') {
        $this->getSmarty()->display($tpl . TemplatePostfix);
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
        $this->d($this->getSmarty(), $die);
    }

    public function getSmarty() {
        return $this->smarty;
    }
}
