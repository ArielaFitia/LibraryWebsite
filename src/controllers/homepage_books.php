<?php

require_once('src/model.php');

function homepage_books()
{
    $books = getAllbooks();

    require('templates/homepage_books.php');
}
