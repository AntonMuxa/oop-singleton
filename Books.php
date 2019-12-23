<?php
require('Db.php');

class Books
{
    public function getBooks()
    {
		$pdo = Db::getInstance();
		return $pdo->pdoFetchAll('SELECT * FROM books');
    }

    public function getBook($id)
    {
		$pdo = Db::getInstance();
		return $pdo->pdoFetchAll("SELECT * FROM books WHERE id = '" . $id . "'");
    }
}