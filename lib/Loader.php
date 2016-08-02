<?php
namespace lib;

class Loader extends Logger {
    public static function loadClass($class) {
        $path = explode("\\", $class);
        $file = implode(SEPARATOR, $path) . EXT_PHP;
        if(!file_exists($file)) return false;

        require_once($file);

        parent::Log(__METHOD__, "Class $class has been loaded!");
    }
}
