<?php

require_once('src/lib/database.php');
require_once('src/model/book.php');

function admin_books()
{
    $bookRepository = new BookRepository(new DatabaseConnection());
    $books = $bookRepository->getAllbooks();

    require('templates/admin_books.php');
}
