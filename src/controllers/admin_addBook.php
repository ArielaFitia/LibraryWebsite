<?php

require_once('src/lib/database.php');
require_once('src/model/book.php');

function admin_addBook()
{
    $confirmationMessage = '';

    // Créez une instance de BookRepository
    $bookRepository = new BookRepository(new DatabaseConnection());

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $synopsis = $_POST['synopsis'];
        $availability = $_POST['availability'];
        $coverImage = $_FILES['cover_image'];

        // Utilisez la méthode addBook du repository pour ajouter un livre
        $bookRepository->addBook($title, $author, $synopsis, $availability, $coverImage);

        $confirmationMessage = 'Le livre a été ajouté avec succès.';
    }

    require('templates/admin_addBook.php');
}
