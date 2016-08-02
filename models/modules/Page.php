<?php
namespace models\modules;

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
