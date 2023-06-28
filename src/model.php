<?php

function getBooks()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=library_website;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $statement = $db->query("SELECT * FROM `book`");
    $books = [];

    while (($row = $statement->fetch())) {
        $book = [
            'title' => $row['title'],
            'author' => $row['author'],
            'synopsis' => $row['synopsis']
        ];
        $books[] = $book;
    }
    return $books;
}
