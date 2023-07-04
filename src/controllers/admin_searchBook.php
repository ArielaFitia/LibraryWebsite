<?php

require_once('src/lib/database.php');
require_once('src/model/book.php');

function admin_searchBook()
{
    $bookRepository = new BookRepository(new DatabaseConnection());
    if (isset($_POST['search_query'])) {
        $searchQuery = $_POST['search_query'];
        $books = $bookRepository->searchBook($searchQuery);
    }

    require('templates/admin_searchBook.php');
}
