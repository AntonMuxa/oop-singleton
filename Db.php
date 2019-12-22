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

    static public function getDb(){
        if(empty(self::$db))
        {
            self::$db = new self();
        }
        return self::$db->conn;
    }

    static public function query($sql,
                          $params = [])
    {
        $stmt = self::getDb()->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':' . $key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    static public function row($sql,
                        $params = [])
    {
        $result = self::query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function column($sql,
                           $params = [])
    {
        $result = self::query($sql, $params);
        return $result->fetchColumn();
    }
}
