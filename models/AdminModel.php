<?php
namespace models;

use lib\DataBase;

class AdminModel {
    public $user;
    public $userID;
    public $right;

    public function isAuthenticated() {
        session_start();

        if(isset($_SESSION['userHash']) && isset($_SESSION['userID']))
        {
            $sql = 'SELECT
                        Accounts.id,
                        Accounts.username,
                        Accounts.role,
                        Accounts.active
                    FROM
                        "Accounts" AS Accounts
                    WHERE
                        Accounts.hash = ?
                    AND
                        Accounts.id = ?
                    LIMIT 1';
            $result = DataBase::getInstance()->Query($sql, array($_SESSION['userHash'], $_SESSION['userID']));
            if($result->rowCount() != 1) return false;

            $row = $result->fetch();
            if(!(bool)$row['active']) return false;

            $this->user = $row['username'];
            $this->userID = $row['id'];
            $this->right = $row['role'];

            if(!$this->canEnter()) return false;

            return true;
        }

        return false;
    }

    public function auth($username, $password) {
        if(!isset($username) || !isset($password)) return false;
        if(empty($username) || empty($password)) return false;

        $sql = 'SELECT
                    Accounts.id,
                    Accounts.username,
                    Accounts.password,
                    Accounts.active,
                    Accounts.role
                FROM
                    "Accounts" AS Accounts
                WHERE
                    LOWER(Accounts.username) = LOWER(?)
                LIMIT 1
                    ';
        $result = DB::getInstance()->Query($sql, array($username));
        if($result->rowCount() != 1) return false;

        $row = $result->fetch();

        if(!(bool)$row['active']) return false;
        if(!password_verify($password, $row['password'])) return false;

        $this->userID = $row['id'];
        $this->right = $row['role'];
        $this->user = $row['username'];

        if(!$this->canEnter()) return true;

        $hash = md5(uniqid(rand(), true));
        $sql = 'UPDATE "Accounts"
                SET hash = ?, "lastLogin" = NOW()
                WHERE id = ?';
        $result = DB::getInstance()->Query($sql, array($hash, $this->userID));

        session_start();

        $_SESSION['userHash'] = $hash;
        $_SESSION['userID'] = $this->userID;

        return true;
    }

    public function canEnter() {
        if(!in_array($this->right, ADMIN_ACCESS)) return false;
        return true;
    }
}
