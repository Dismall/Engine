<?php
require_once(Dir . "/models/modules/pagesModel.php");
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

        $offset = 0;
        if(isset($_GET['ssf']) && intval($_GET['ssf']) > 0) $offset = (intval($_GET['ssf']) - 1) * ArticlesDefaultCount;

        $page = new PageModel();
        $this->smarty->assign('pages', $page->getPages(ArticlesDefaultCount, $offset));

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
