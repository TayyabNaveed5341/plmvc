<?php
require_once "m/Database.php";

class User
{
    static function all(){
        return Database::raw('select * from users');
    }
    static function allWithDesignations(){
        return Database::raw(
            "SELECT users.id, users.name, YEAR(current_date)- YEAR(dob) as age, designations.name as designation, address, contact
FROM users left join designations on users.designation_id=designations.id"
        );
    }
    static function updateDesignation($users,$designation_id){
        $u=trim(json_encode($users),'[]');
        return Database::raw("update users set designation_id=$designation_id where id in ($u)");
    }

}