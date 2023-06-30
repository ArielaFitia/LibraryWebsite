<?php

function getBooks()
{
    $db = dbConnect();
    $statement = $db->query("SELECT * FROM book ORDER BY id DESC LIMIT 3");
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

function getAllbooks()
{
    $db = dbConnect();
    $statement = $db->query("SELECT * FROM book");
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

function searchBooks($keyword)
{
    $db = dbConnect();
    $statement = $db->prepare("SELECT * FROM book WHERE title LIKE :keyword OR author LIKE :keyword");
    $statement->execute([':keyword' => '%' . $keyword . '%']);

    $books = [];

    while (($row = $statement->fetch())) {
        $book = [
            'title' => $row['title'],
            'author' => $row['author'],
            'synopsis' => $row['synopsis'],
            'availability' => $row['availability']
        ];
        $books[] = $book;
    }

    return $books;
}

function dbConnect()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=library_website;charset=utf8', 'root', 'root');
        return $db;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
