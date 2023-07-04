<?php

require_once('src/lib/database.php');
require_once('src/model/book.php');

function homepage_search()
{
    $bookRepository = new BookRepository(new DatabaseConnection());
    if (isset($_POST['search_query'])) {
        $searchQuery = $_POST['search_query'];
        $books = $bookRepository->searchBook($searchQuery);
    }

    require('templates/homepage_search.php');
}
