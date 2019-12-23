<?php

final class Db
{

    private static $db;

    private function __clone(){}
    private function __wakeup(){}

    private function __construct()
    {
        $config = require 'config.php';
        $this->conn = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . '', $config['user'],
            $config['password']);
    }

    static public function getInstance(){
        if(empty(self::$db))
        {
            self::$db = new self();
        }
        return self::$db->conn;
    }
}
