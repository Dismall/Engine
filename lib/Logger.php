<?php
namespace lib;

class Logger {
    public static function Log($method, $message) {
        $message = sprintf("[%s] Method: %s, Message: %s\r\n", date("H:i:s"), $method, $message);
        $file = fopen(DIR . SEPARATOR . "log.txt", "a+");
        fwrite($file, $message);
        fclose($file);
    }
}
