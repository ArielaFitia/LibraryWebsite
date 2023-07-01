<?php

require_once('src/model.php');

function admin_books()
{
    $books = getAllbooks();

    require('templates/admin_books.php');
}
