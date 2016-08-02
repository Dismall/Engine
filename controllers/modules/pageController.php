<?php
namespace controllers\modules;

use models\modules\PageModel;
use lib\mainFunctions;

class pageController implements IModule {
    protected static $name = "Страницы";
    protected static $actions = array(
                                    "Добавить" => "add",
                                    "Теги" => "tags"
                                );
    protected static $ver = 1;

    private $smarty;

    public function indexAction()
    {
        $this->setup();

        $offset = 0;
        if(isset($_GET['ssf']) && intval($_GET['ssf']) > 0) $offset = (intval($_GET['ssf']) - 1) * ArticlesDefaultCount;

        $page = new PageModel();
        $this->smarty->assign('pages', $page->getPages(ArticlesDefaultCount, $offset));
    }

    function setup()
    {
        $mainf = mainFunctions::getInstance();
        $this->smarty = $mainf->getSmarty();

        $this->smarty->assign('module_name', self::$name);
        $this->smarty->assign('module_actions', self::$actions);
    }
}
