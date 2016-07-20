<?php
require_once("/models/modules/articlesModel.php");
require_once(PathPrefix . "IModuleInterface.php");

class Articles implements IModuleActionSetup {
    protected static $name = "Статьи";
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

        $articles = new News();
        $this->smarty->assign('articles', $articles->getNews(null, $offset));

        $this->endSetup();
    }

    public function addAction()
    {
        $this->basicSetup();
        $this->endSetup();
    }

    public function deleteAction()
    {
        $this->basicSetup();
        $articles = new News();

        if(isset($_POST['deleteID']) || isset($_GET['id']))
        {
            $id = isset($_POST['deleteID']) ? $_POST['deleteID'] : $_GET['id'];
            $this->smarty->assign('message', $articles->deleteArticle(intval($id)) ? 'Удалено' : 'Ошибка');
        }
        else
        {
            $this->smarty->assign('error_message', 'Значение не определено!');
            errorAction($this->smarty, $GLOBALS['mainFunc']);
        }

        $this->endSetup();
    }

    public function editAction()
    {
        $this->basicSetup();

        if(!isset($_GET['id']))
        {
            $this->smarty->assign('error_message', 'Значение не определено!');
            errorAction($this->smarty, $GLOBALS['mainFunc']);
        }

        $articles = new News();
        $res = $articles->getArticleById(intval($_GET['id']));
        if($res) $this->smarty->assign('article', $res);

        $this->endSetup();
    }

    public function saveAction()
    {
        $this->basicSetup();

        if(isset($_POST['title']) && isset($_POST['articleText']) && isset($_POST['visiable']) && isset($_POST['author']))
        {
            $articles = new News();
            $result = $articles->addArticle($_POST['title'], $_POST['articleText'], $_POST['author'], $_POST['visiable']);

            $this->smarty->assign('message', $result ? 'Сохранено' : 'Ошибка');
        }
        $this->endSetup();
    }

    public function updateAction()
    {
        $this->basicSetup();

        $this->smarty->assign('message', 'Ошибка!');

        if(isset($_GET['id']))
        {
            $_POST['visiable'] = isset($_POST['visiable']) ? 'true' : 'false';
            if(isset($_POST['title']) && isset($_POST['articleText']) && isset($_POST['visiable']) && isset($_POST['author']))
            {
                $articles = new News();
                $r = $articles->updateArticle(intval($_GET['id']),
                                        $_POST['title'],
                                        $_POST['articleText'],
                                        $_POST['author'],
                                        $_POST['visiable']);

                if($r) $this->smarty->assign('message', 'Обновлено!');
            }
        }

        $this->endSetup();
    }

    public function tagsAction() {
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
