<?php
namespace classes;

class Session {
    public static function Open($uID, $hash) {
        session_start();
        $_SESSION['userID'] = $uID;
        $_SESSION['userHash'] = $hash;

        return true;
    }

    public static function getHash() {
        session_start();
        return $_SESSION['userHash'];
    }

    public static function getID() {
        session_start();
        return $_SESSION['userID'];
    }

    public static function Close() {
        session_destroy();
    }
}
