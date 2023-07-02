<?php

require_once('src/model.php');

function member_dashboard()
{
    $books = getBooks();

    require('templates/member_dashboard.php');
}
