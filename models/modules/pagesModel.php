<?php
/**
 * Класс страницы
 */
class Page {
    public $id;
    public $title;
    public $head;
    public $js;
    public $css;
    public $body;
    public $footer;

    /**
     * Создание объекта страницы
     * @param string $t Заголовок
     * @param json $h Шаблоны шапки
     * @param json $j Пути к js
     * @param json $c Пути к css
     * @param json $b Шаблоны тела
     * @param json $f Шаблоны подвала
     */
    public function __construct($id, $t, $h, $j, $c, $b, $f) {
        $this->id = $id;
        $this->title = $t;
        $this->head = $h;
        $this->js = $j;
        $this->css = $c;
        $this->body = $b;
        $this->footer = $f;
    }
}

class PageModel {
    private $db;

    public function __construct() {
        $this->db = $GLOBALS['db'];
    }

    public function getPages($count, $offset = 0) {
        $sql = 'SELECT
                    Page.id,
                    Page.title,
                    Page.settings,
                    Page.templates
                FROM
                    "Pages" AS Page
                ORDER BY
                    Page.id DESC
                LIMIT ? OFFSET ?';

        $result = $this->db->Query($sql, array($count, $offset));

        while ($row = $result->fetch()) {
            $template = json_decode($row['templates'], true);
            $settings = json_decode($row['settings'], true);

            $page[] = new Page($row['id'],
                            $row['title'],
                            $template['head'],
                            $settings['js'],
                            $settings['css'],
                            $template['body'],
                            $template['footer']);
        }

        return $page;
    }

    public function getPageByID($id) {
        $sql = 'SELECT
                    Page.id,
                    Page.title,
                    Page.settings,
                    Page.templates
                FROM
                    "Pages" AS Page
                WHERE Page.id = ?';
        $result = $this->db->Query($sql, array($id));

        if($result->rowCount() != 1) return false;
        $row = $result->fetch();
        $template = json_decode($row['templates'], true);
        $settings = json_decode($row['settings'], true);

        $page = new Page($row['id'],
                        $row['title'],
                        $template['head'],
                        $settings['js'],
                        $settings['css'],
                        $template['body'],
                        $template['footer']);
        return $page;
    }
}
