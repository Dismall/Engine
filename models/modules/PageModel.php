<?php
namespace models\modules;

use lib\DataBase;
/**
 * Класс страницы
 */

class PageModel {
    private $db;

    public function __construct() {
        $this->db = DataBase::getInstance();
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
