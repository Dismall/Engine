<?php
namespace models\modules;

class Article {
    public $title;
    public $text;
    public $author;
    public $date;
    public $tags;
    public $comments;
    public $id;
    public $show;

    public function __construct($a, $c, $d, $e, $f, $g, $h, $i) {
        $this->title = $a;
        $this->text = $c;
        $this->author = $d;
        $this->date = date("d.m.Y H:i:s", strtotime($e));
        $this->tags = $f;
        $this->comments = $g;
        $this->id = $h;
        $this->show = $i;
    }
}
