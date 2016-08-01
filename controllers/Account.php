<?php
require_once(PathPrefix . "IAccount.php");
require_once(Dir . '/models/AccountModel.php');

class Account implements IAccount {
    private $id;
    private $username;
    private $role;

    private static $instance;

    public function Auth($login, $password) {
        $user = AccountModel::AuthUser($login, $password);

        if($user['success'])
        {
            $this->id = $user['id'];
            $this->username = $user['name'];
            $this->role = $user['role'];

            session_start();
            $_SESSION['userHash'] = $user['hash'];
            $_SESSION['userID'] = $user['id'];

            return array("success" => true, "message" => "Авторизация выполнена!", "method" => __METHOD__);
        }

        return array("success" => false, "message" => $user['message'], "method" => __METHOD__);
    }

    public function DeAuth() {
        session_destroy();
    }

    public function isAdmin() {
        return (isset($role) && $role === "Admin") ? true : false;
    }

    public function getID() {
        return $this->id;
    }

    public function getName() {
        return $this->username;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public static function getInstance() {
        if(!isset(self::$instance))
            self::$instance = new Account();

        return self::$instance;
    }
}
