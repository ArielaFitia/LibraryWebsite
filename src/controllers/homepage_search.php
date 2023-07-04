<?php

require_once('src/model/book.php');

function homepage_search()
{
    if (isset($_POST['search_query'])) {
        $searchQuery = $_POST['search_query'];
        $books = searchBook($searchQuery);
    }

    require('templates/homepage_search.php');
}
