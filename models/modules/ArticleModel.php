<?php
namespace models\modules;

use lib\DataBase;

class ArticleModel {
    private $db;

    public function __construct() {
        $this->db = DataBase::getInstance();
    }

    public function getNews($show = true, $offset = 0, $count = ArticlesDefaultCount) {
        $sql = 'SELECT
                    Article.title,
                    Article.text,
                    Accounts.username AS author,
                    (SELECT
                        array_to_json(array_agg(Tags.name))
                    FROM
                        "Tags" AS Tags,
                        "ArticleTags" AS ATags
                    WHERE
                        ATags."ArticleId" = Article.id
                    AND
                        Tags.id = ATags."TagId"
                    LIMIT 10
                    ) AS tag,
                    Article.date,
                    Article.id,
                    Article.show
                FROM
	                "Articles" AS Article,
                    "Accounts" AS Accounts
                WHERE
                    Accounts.id = Article.author
                ' . (isset($show) ? 'AND Article.show = ' . ($show ? 'true' : 'false') : '') . '
                ORDER BY
                    Article.id DESC
                LIMIT ? OFFSET ?';

        $result = $this->db->Query($sql, array($count, $offset));

        $article = array();
        while ($row = $result->fetch()) {
            $article[] = new Article($row['title'],
                                    $row['text'],
                                    $row['author'],
                                    $row['date'],
                                    $row['tag'] != null ? implode(json_decode($row['tag']), ", ") : null, //Раскодирование JSON и соединение массива
                                    null, $row['id'], $row['show']);
        }

        return $article;
    }

    public function getArticleById($id) {
        $sql = 'SELECT
                    Article.title,
                    Article.text,
                    Accounts.username AS author,
                    (SELECT
                        array_to_json(array_agg(Tags.name))
                    FROM
                        "Tags" AS Tags,
                        "ArticleTags" AS ATags
                    WHERE
                        ATags."ArticleId" = Article.id
                    AND
                        Tags.id = ATags."TagId"
                    LIMIT 10
                    ) AS tag,
                    Article.date,
                    Article.show
                FROM
                    "Articles" AS Article,
                    "Accounts" AS Accounts
                WHERE
                    Accounts.id = Article.author
                    AND
                    Article.id = ?';

        $result = $this->db->Query($sql, array($id));
        if($result->rowCount() != 1) return false;

        $row = $result->fetch();
        $article = new Article($row['title'],
                                $row['text'],
                                $row['author'],
                                $row['date'],
                                $row['tag'] != null ? implode(json_decode($row['tag']), ", ") : null, //Раскодирование JSON и соединение массива
                                null,
                                $id, $row['show']);

        return $article;
    }

    public function getArticleByTitle($title) {

    }

    public function searchArticleByTitle() {

    }

    public function searchArticleByTime() {

    }

    public function searchArticleByComment() {

    }

    public function searchArticleByTag() {

    }

    public function addArticle($title, $content, $author, $visiable) {
        $sql = 'SELECT Accounts.id FROM "Accounts" AS Accounts WHERE LOWER(Accounts.username) = LOWER(?)';
        $result = $this->db->Query($sql, array($author));
        if($result->rowCount() != 1)
            return $this->error(ARTICLES_USER_NOTFOUND, __METHOD__);
        $id = $result->fetch()['id'];

        $visiable = $visiable ? 'true' : 'false';
        $sql = 'INSERT INTO "Articles"(title, text, author, show, date) VALUES(?, ?, ?, ?, NOW())';
        $this->db->Query($sql, array(
                                    $title,
                                    $content,
                                    $id,
                                    $visiable
                                ));

        return $this->success(ARTICLES_ADD_SUCCESS, __METHOD__);
    }

    public function deleteArticle($id) {
        $sql = 'DELETE FROM "Articles" WHERE id = ?';
        $r = $this->db->Query($sql, array($id));
        if($r->rowCount() != 1)
            return $this->error(ARTICLES_DELETE_ERROR, __METHOD__);

        return $this->success(ARTICLES_DELETE_SUCCESS, __METHOD__);
    }

    public function updateArticle($id, $title, $text, $author, $show) {

        $sql = 'SELECT Accounts.id FROM "Accounts" AS Accounts WHERE LOWER(Accounts.username) = LOWER(?)';
        $result = $this->db->Query($sql, array($author));
        if($result->rowCount() != 1)
            return $this->error(ARTICLES_USER_NOTFOUND, __METHOD__);
        $userID = $result->fetch()['id'];

        $sql = 'UPDATE "Articles" SET title=?, text=?, author=?, show=? WHERE id=?';
        $result = $this->db->Query($sql, array($title, $text, $userID, $show, $id));
        if($result->rowCount() != 1)
            return $this->error(ARTICLES_UPDATE_ERROR, __METHOD__);

        return $this->success(ARTICLES_UPDATE_SUCCESS, __METHOD__);
    }

    private function error($str, $method) {
        return array("success" => false, "method" => $method, "message" => $str);
    }

    private function success($str, $method) {
        return array("success" => true, "method" => $method, "message" => $str);
    }
}
