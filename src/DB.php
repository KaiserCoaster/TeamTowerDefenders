<?php

class DB {

    private static $con;
    
    private static function connect() {
        if(!self::$con) {
            $dbhost = Config::DB_HOST;
            $dbname = Config::DB_NAME;
            $dbuser = Config::DB_USER;
            $dbpass = Config::DB_PASS;
            self::$con = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        }
    }
    
    public static function prepare($sql) {
        self::connect();
        return  self::$con->prepare($sql);
    }
    
    /*public static function execute($arr) {
        $this->connect();
        $this->con->execute($arr);
    }
    
    public static function setFetchMode($mode) {
        $this->connect();
        $this->con->setFetchMode($mode);
    }*/
    
    public static function query($sql) {
        self::connect();
        return self::$con->query($sql);
    }
    
    /*public static function fetch() {
        $this->connect();
        return $this->con->fetch();
    }*/
    
    public static function lastInsertId() {
        return self::$con->lastInsertId();
    }

}

?>