<?php
interface IAccount {
    public $id;
    public $username;
    public $role;
    public $avatar;

    public getAvatarName();
    public isAdmin() {
        return ($this->role === "Admin") ? true : false;
    }
}
