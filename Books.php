<?php
require('Db.php');

class Books
{
    public function getBooks()
    {
        return Db::row('SELECT * FROM books');
    }

    public function getBook($id)
    {
        return Db::row("SELECT * FROM books WHERE id = '" . $id . "'");
    }
}