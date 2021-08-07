<?php
require_once "m/User.php";

class UsersController
{
    public static function bulkDesignationUpdate(){
        if(ctype_digit($_REQUEST["designation"]) && is_array($_REQUEST["user"])){
            $users=array_filter($_REQUEST["user"],'ctype_digit');
            User::updateDesignation($users,$_REQUEST["designation"]);
        }
        return include('v/ajax/users.php');
    }
}