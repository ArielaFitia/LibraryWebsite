<?php

require_once('src/model/book.php');

function admin_addBook()
{
    $confirmationMessage = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $synopsis = $_POST['synopsis'];
        $availability = $_POST['availability'];
        $coverImage = $_FILES['cover_image'];

        addBook($title, $author, $synopsis, $availability, $coverImage);

        $confirmationMessage = 'Le livre a été ajouté avec succès.';
    }

    require('templates/admin_addBook.php');
}
