<?php

require('src/model.php');

$books = getBooks();

require('templates/homepage.php');
