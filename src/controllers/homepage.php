<?php

require_once('src/model/book.php');

function homepage()
{
    $books = getBooks();

    require('templates/homepage.php');
}
