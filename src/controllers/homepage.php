<?php

require_once('src/model.php');

function homepage()
{
    $books = getBooks();

    require('templates/homepage.php');
}
