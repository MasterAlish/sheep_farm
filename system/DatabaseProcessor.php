<?php

class DatabaseProcessor {
    protected static $connection;

    private function __construct(){}
    private function __clone(){}

    public static function query($query, $use_db=true){
        GLOBAL $mysql;
        if(self::$connection === null){
            self::$connection = mysql_connect($mysql['host'],$mysql['username'],$mysql['password']) or die('Can\'t connect to MySQL!');
        }

        if($use_db) mysql_select_db($mysql['db_name']) or die(mysql_error());

        $result = mysql_query($query);
        if(is_resource($result)){
            $rows=array();
            while($row = mysql_fetch_assoc($result)){
                $rows[] = $row;
            }
            return $rows;
        }
        return $result;
    }
}
