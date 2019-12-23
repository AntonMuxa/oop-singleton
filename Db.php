<?php

final class Db
{

    private static $instanse;

    private function __clone(){}
    private function __wakeup(){}

    private function __construct()
    {
        $config = require 'config.php';
        $this->pdo = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . '', $config['user'], $config['password']);
    }

    static public function getInstance(){
        if(empty(self::$instanse))
        {
            self::$instanse = new self();
        }
        return self::$instanse;
    }
	
	public function pdoConnection() {
		return $this->pdo;
	}
	
	public function pdoFetchAll($sql) {
		$stm = $this->pdo->prepare($sql);
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}
}
