<?php

require_once('src/controllers/homepage.php');
require_once('src/controllers/homepage_books.php');

if (isset($_GET['action']) && $_GET['action'] !== '') {
    if ($_GET['action'] === 'homepage_books') {
        homepage_books();
    } else {
        echo "Erreur 404 : la page que vous recherchez n'existe pas.";
    }
} else {
    homepage();
}
