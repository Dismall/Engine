<?php
namespace classes;

use models\AccountModel;

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

            Session::Open($user['id'], $user['hash']);

            return array("success" => true, "message" => "Авторизация выполнена!", "method" => __METHOD__);
        }

        return array("success" => false, "message" => $user['message'], "method" => __METHOD__);
    }

    public function isAuth() {
        $user = AccountModel::CheckAuth(Session::getID(), Session::getHash());

        if($user['success'])
        {
            $this->id = $user['id'];
            $this->username = $user['name'];
            $this->role = $user['role'];

            return array("success" => true, "message" => "Авторизация выполнена!", "method" => __METHOD__);
        }

        return array("success" => false, "message" => $user['message'], "method" => __METHOD__);
    }

    public function DeAuth() {
        Session::Close();
    }

    public function isAdmin() {
        return (isset($this->role) && $this->role === "Admin") ? true : false;
    }

    public function getID() {
        return $this->id;
    }

    public function getRole() {
        return $this->role;
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
