<?php
require_once(Dir . "/models/modules/articlesModel.php");
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
            $result = $articles->deleteArticle(intval($id));

            $this->smarty->assign(($result['success'] ? 'success' : 'error') . '_message', $result['message']);
        }
        else
        {
            $this->smarty->assign('error_message', ARTICLES_EMPTYPARAM);
        }

        $this->endSetup();
    }

    /**
     * Редактирование статьи
     * @return void
     */
    public function editAction()
    {
        if(!isset($_GET['id'])) header("Location: /admin/modules/articles");

        $this->basicSetup();

        $articles = new News();
        $res = $articles->getArticleById(intval($_GET['id']));
        if($res) $this->smarty->assign('article', $res);

        $this->endSetup();
    }

    /**
     * Создание статьи (добавление)
     * @return void
     */
    public function saveAction()
    {
        $this->basicSetup();

        if(isset($_POST['title']) && isset($_POST['articleText']) && isset($_POST['visiable']) && isset($_POST['author']))
        {
            $articles = new News();
            $result = $articles->addArticle($_POST['title'], $_POST['articleText'], $_POST['author'], $_POST['visiable']);

            $this->smarty->assign(($result['success'] ? 'success' : 'error') . '_message', $result['message']);
        }
        $this->endSetup();
    }

    /**
     * Обновление статьи
     * @return void
     */
    public function updateAction()
    {
        $this->basicSetup();

        $_POST['visiable'] = isset($_POST['visiable']) ? 'true' : 'false';

        if(isset($_GET['id']) && isset($_POST['title']) && isset($_POST['articleText']) && isset($_POST['visiable']) && isset($_POST['author']))
        {
            $articles = new News();
            $result = $articles->updateArticle(intval($_GET['id']),
                                    $_POST['title'],
                                    $_POST['articleText'],
                                    $_POST['author'],
                                    $_POST['visiable']);
            $this->smarty->assign(($result['success'] ? 'success' : 'error') . '_message', $result['message']);
        }
        else
            $this->smarty->assign('error_message', ARTICLES_UPDATE_ERROR);

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
