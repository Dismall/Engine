<?php
require_once(PathPrefix . "IAccount.php");

class Account implements IAccount {
    public $id;
    public $username;
    public $role;
    public $avatar;

    public function __construct() {

    }
}
