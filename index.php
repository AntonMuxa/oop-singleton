<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('Books.php');

$books = new Books();
echo '<pre>';
print_r($books->getBooks());
print_r($books->getBook(1));
