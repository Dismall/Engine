<?php
namespace lib;

class Loader {
    public static function loadClass($class) {
        $path = explode("\\", $class);

        $file = implode(SEPARATOR, $path) . EXT_PHP;

        //echo var_dump($file);

        if(!file_exists($file)) return false;

        require_once($file);
    }

    public static function loadSmarty($class) {
        //if($class != 'Smarty') return false;

    }
}
