<?php

require_once('src/model/book.php');

function admin_searchBook()
{
    if (isset($_POST['search_query'])) {
        $searchQuery = $_POST['search_query'];
        $books = searchBook($searchQuery);
    }

    require('templates/admin_searchBook.php');
}
