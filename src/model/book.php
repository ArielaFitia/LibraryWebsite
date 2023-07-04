<?php

function getBooks()
{
    $db = bookDbconnect();
    $statement = $db->query("SELECT * FROM book ORDER BY id DESC LIMIT 3");
    $books = [];

    while (($row = $statement->fetch())) {
        $book = [
            'id' => $row['id'],
            'title' => $row['title'],
            'author' => $row['author'],
            'synopsis' => $row['synopsis'],
            'availability' => $row['availability'],
            'cover_image' => $row['cover_image']
        ];
        $books[] = $book;
    }
    return $books;
}

function getAllbooks()
{
    $db = bookDbconnect();
    $statement = $db->query("SELECT * FROM book");
    $books = [];

    while (($row = $statement->fetch())) {
        $book = [
            'id' => $row['id'],
            'title' => $row['title'],
            'author' => $row['author'],
            'synopsis' => $row['synopsis'],
            'availability' => $row['availability'],
            'cover_image' => $row['cover_image']
        ];
        $books[] = $book;
    }
    return $books;
}

function searchBook($searchQuery)
{
    $db = bookDbconnect();
    $statement = $db->prepare("SELECT * FROM book WHERE LOWER(title) LIKE LOWER(:query) OR LOWER(author) LIKE LOWER(:query)");
    $searchParam = "%$searchQuery%";
    $statement->bindParam(':query', $searchParam);
    $statement->execute();
    $books = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $books;
}


function updateBook($bookId, $title, $author, $synopsis, $availability)
{
    $db = bookDbconnect();
    $statement = $db->prepare("UPDATE book SET title = :title, author = :author, synopsis = :synopsis, availability = :availability WHERE id = :bookId");
    $statement->bindParam(':title', $title);
    $statement->bindParam(':author', $author);
    $statement->bindParam(':synopsis', $synopsis);
    $statement->bindParam(':availability', $availability);
    $statement->bindParam(':bookId', $bookId);
    $statement->execute();
}

function addBook($title, $author, $synopsis, $availability, $coverImage)
{
    $db = bookDbconnect();

    // Préparation de la requête SQL pour l'insertion du livre
    $statement = $db->prepare('INSERT INTO book (title, author, synopsis, availability, cover_image) VALUES (?, ?, ?, ?, ?)');

    // Déplacement et stockage de l'image de couverture dans un dossier spécifique
    $coverImageName = moveUploadedCoverImage($coverImage);

    // Exécution de la requête avec les valeurs fournies
    $statement->execute([$title, $author, $synopsis, $availability, $coverImageName]);
}

function moveUploadedCoverImage($coverImage)
{
    $uploadDirectory = 'cover_images/';
    $coverImageName = generateUniqueFileName($coverImage['name']);
    $targetPath = $uploadDirectory . $coverImageName;

    // Déplacement du fichier temporaire vers l'emplacement final
    move_uploaded_file($coverImage['tmp_name'], $targetPath);

    return $coverImageName;
}

function generateUniqueFileName($originalFileName)
{
    $uniqueName = uniqid() . '_' . $originalFileName;
    return $uniqueName;
}

function bookDbconnect()
{

    $db = new PDO('mysql:host=localhost;dbname=library_website;charset=utf8', 'root', 'root');
    return $db;
}
