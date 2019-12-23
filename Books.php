<?php
require('Db.php');

class Books
{
    public function getBooks()
    {
		$pdo = Db::getInstance()->pdoConnection();
		$sql = 'SELECT * FROM books';
		$stm = $pdo->prepare($sql);
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBook($id)
    {
		$pdo = Db::getInstance()->pdoConnection();
		$sql = "SELECT * FROM books WHERE id = '" . $id . "'";
		$stm = $pdo->prepare($sql);
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}