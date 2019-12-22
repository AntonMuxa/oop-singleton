<?php
require('Db.php');

class Books
{
    public function getBooks()
    {
        return Db::getInstance()->query('SELECT * FROM books')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBook($id)
    {
        return Db::getInstance()->query("SELECT * FROM books WHERE id = '" . $id . "'")->fetchAll(PDO::FETCH_ASSOC);
    }
}