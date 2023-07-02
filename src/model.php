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
            'id' => $row['id'],
            'title' => $row['title'],
            'author' => $row['author'],
            'synopsis' => $row['synopsis'],
            'availability' => $row['availability']
        ];
        $books[] = $book;
    }
    return $books;
}

function searchBook($searchQuery)
{
    $db = dbConnect();
    $statement = $db->prepare("SELECT * FROM book WHERE title LIKE :query OR author LIKE :query");
    $searchParam = "%$searchQuery%";
    $statement->bindParam(':query', $searchParam);
    $statement->execute();
    $books = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $books;
}

function updateBook($bookId, $title, $author, $synopsis, $availability)
{
    $db = dbConnect();
    $statement = $db->prepare("UPDATE book SET title = :title, author = :author, synopsis = :synopsis, availability = :availability WHERE id = :bookId");
    $statement->bindParam(':title', $title);
    $statement->bindParam(':author', $author);
    $statement->bindParam(':synopsis', $synopsis);
    $statement->bindParam(':availability', $availability);
    $statement->bindParam(':bookId', $bookId);
    $statement->execute();
}


function addAdmin()
{
    $db = dbConnect();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération des données du formulaire
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Insertion des données dans la table "user"
        $statement = $db->prepare('INSERT INTO user (fullname, email, password, status) VALUES (?, ?, ?, ?)');
        $statement->execute([$fullname, $email, $password, 'admin']);

        // Affichage d'un message de succès
        echo "Inscription réussie !";
    }
}

function login()
{
    $db = dbConnect();
    // Traitement du formulaire de connexion
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        // Vérification des informations de connexion dans la base de données
        $statement = $db->prepare("SELECT * FROM user WHERE email = :email AND password = :password AND status = :status");
        $statement->execute(['email' => $email, 'password' => $password, 'status' => $status]);
        $user = $statement->fetch();

        if ($user) {
            // Connexion réussie, rediriger en fonction du statut
            if ($status === 'membre') {
                header('Location: index.php?action=member_dashboard');
                exit();
            } elseif ($status === 'admin') {
                header('Location: index.php?action=admin_dashboard');
                exit();
            }
        } else {
            throw new Exception("Identifiants incorrects. Veuillez réessayer.");
        }
    }
}

function dbConnect()
{

    $db = new PDO('mysql:host=localhost;dbname=library_website;charset=utf8', 'root', 'root');
    return $db;
}
