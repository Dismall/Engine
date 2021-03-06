<?php
namespace controllers\modules;

use models\modules\ArticleModel;
use lib\mainFunctions;

class articleController implements IModule {
    protected static $name = "Статьи";
    protected static $actions = array(
                                    "Добавить" => "add",
                                    "Теги" => "tags"
                                );
    protected static $ver = 1;

    private $smarty;

    public function indexAction()
    {
        $offset = 0;
        if(isset($_GET['ssf']) && intval($_GET['ssf']) > 0) $offset = (intval($_GET['ssf']) - 1) * ArticlesDefaultCount;

        $this->setup();
        $articles = new ArticleModel();
        $this->smarty->assign('articles', $articles->getNews(null, $offset));
    }

    public function addAction()
    {
        $this->setup();

        $articles = new ArticleModel();
        $result = $articles->getAllTags();
        if($result)
            while($row = $result->fetch())
                $tags[] = $row['name'];

        $this->smarty->assign('tags', $tags);
    }

    public function deleteAction()
    {
        $this->setup();
        $articles = new ArticleModel();

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
    }

    /**
     * Редактирование статьи
     * @return void
     */
    public function editAction()
    {
        if(!isset($_GET['id'])) header("Location: /admin/modules/articles");

        $this->setup();

        $articles = new ArticleModel();
        $res = $articles->getArticleById(intval($_GET['id']));
        
        $tags = $articles->getAllTags();
        while($row = $tags->fetch())
            $tag[] = $row['name'];
        $this->smarty->assign('tags', $tag);

        if($res)
            $this->smarty->assign('article', $res);
    }

    /**
     * Создание статьи (добавление)
     * @return void
     */
    public function saveAction()
    {
        $this->setup();

        if(isset($_POST['title']) && isset($_POST['articleText']) && isset($_POST['visiable']) && isset($_POST['author']))
        {
            $articles = new ArticleModel();
            $result = $articles->addArticle($_POST['title'], $_POST['articleText'], $_POST['author'], $_POST['visiable'], $_POST['tags']);

            $this->smarty->assign(($result['success'] ? 'success' : 'error') . '_message', $result['message']);
        }
    }

    /**
     * Обновление статьи
     * @return void
     */
    public function updateAction()
    {
        $this->setup();

        $_POST['visiable'] = isset($_POST['visiable']) ? 'true' : 'false';

        if(isset($_GET['id']) && isset($_POST['title']) && isset($_POST['articleText']) && isset($_POST['visiable']) && isset($_POST['author']))
        {
            $articles = new ArticleModel();
            $result = $articles->updateArticle(intval($_GET['id']),
                                    $_POST['title'],
                                    $_POST['articleText'],
                                    $_POST['author'],
                                    $_POST['visiable'],
                                    $_POST['tags']);
            $this->smarty->assign(($result['success'] ? 'success' : 'error') . '_message', $result['message']);
        }
        else
            $this->smarty->assign('error_message', ARTICLES_UPDATE_ERROR);
    }

    public function tagsAction() {

    }

    function setup()
    {
        $mainf = mainFunctions::getInstance();
        $this->smarty = $mainf->getSmarty();

        $this->smarty->assign('module_name', self::$name);
        $this->smarty->assign('module_actions', self::$actions);
    }
}
