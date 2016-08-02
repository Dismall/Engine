<?php
namespace models;

use lib\DataBase;

class AccountModel {
    public static function AuthUser($username, $password) {
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

        $result = DataBase::getInstance()->Query($sql, array($username));
        if($result->rowCount() != 1)
            return array("success" => false, "message" => "Пользователь не найден!");

        $row = $result->fetch();

        if(!(bool)$row['active'])
            return array("success" => false, "message" => "Пользователь заблокирован!");
        if(!password_verify($password, $row['password']))
            return array("success" => false, "message" => "Неверный пароль!");

        $hash = md5(uniqid(rand(), true));
        $sql = 'UPDATE "Accounts"
                SET hash = ?, "lastLogin" = NOW()
                WHERE id = ?';
        $result = DataBase::getInstance()->Query($sql, array($hash, $row['id']));

        return array("success" => true,
                    "id" => $row['id'],
                    "name" => $row['username'],
                    "role" => $row['role'],
                    "hash" => $hash);
    }

    public static function CheckAuth() {

    }
}
