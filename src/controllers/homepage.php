<?php

require_once('src/lib/database.php');
require_once('src/model/book.php');

function homepage()
{
    $bookRepository = new BookRepository(new DatabaseConnection());
    $books = $bookRepository->getBooks();

    require('templates/homepage.php');
}
