<?php
require_once(PathPrefix . "IModuleInterface.php");

class Pages implements IModuleActionSetup {
    protected static $name = "Страницы";
    protected static $actions = array(
                                    "Добавить" => "add",
                                    "Теги" => "tags"
                                );
    protected static $ver = 1;

    private $smarty;

    public function indexAction()
    {
        $this->basicSetup();

        $this->endSetup();
    }

    function basicSetup()
    {
        $this->smarty = $GLOBALS['smarty'];
        $this->smarty->assign('module_name', self::$name);
        $this->smarty->assign('module_actions', self::$actions);
    }

    function endSetup()
    {
        $GLOBALS['smarty'] = $this->smarty;
    }
}
