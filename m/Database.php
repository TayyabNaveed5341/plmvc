<?php


class Database
{
    static function connect(){
        $r=new mysqli('localhost', 'root', '', 'cphp3');
        if ($r->connect_error) die("Connection failed: " . $r->connect_error);
        return $r;
    }
    public static function raw($q){
        $c=self::connect();
        $r=$c->query($q);
        $c->close();
        return $r;
    }
}