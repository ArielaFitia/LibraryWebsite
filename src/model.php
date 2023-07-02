<?php

function getBooks()
{
    $db = dbConnect();
    $statement = $db->query("SELECT * FROM book ORDER BY id DESC LIMIT 3");
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

function createLoan($userId, $bookId)
{
    $db = dbConnect();
    $loanDate = date('Y-m-d');
    $returnDate = date('Y-m-d', strtotime('+14 days'));
    $status = 'En attente';

    $statement = $db->prepare("INSERT INTO loan (loan_date, return_date, loan_status, user_id, book_id) VALUES (:loan_date, :return_date, :loan_status, :user_id, :book_id)");
    $statement->execute([
        'loan_date' => $loanDate,
        'return_date' => $returnDate,
        'loan_status' => $status,
        'user_id' => $userId,
        'book_id' => $bookId
    ]);
}

function createSuggestion($message, $userId, $bookId)
{
    $db = dbConnect();

    $statement = $db->prepare("INSERT INTO suggestion (message, user_id, book_id) VALUES (:message, :user_id, :book_id)");
    $statement->execute(['message' => $message, 'user_id' => $userId, 'book_id' => $bookId]);
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
        $id = $_POST['id'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        // Vérification des informations de connexion dans la base de données
        $statement = $db->prepare("SELECT * FROM user WHERE id = :id AND password = :password AND status = :status");
        $statement->execute(['id' => $id, 'password' => $password, 'status' => $status]);
        $user = $statement->fetch();

        if ($user) {
            // Connexion réussie, rediriger en fonction du statut
            if ($status === 'membre') {
                $_SESSION['user_id'] = $user['id']; // Ajout de la ligne de la session
                header('Location: index.php?action=member_dashboard');
                exit();
            } elseif ($status === 'admin') {
                $_SESSION['user_id'] = $user['id']; // Ajout de la ligne de la session
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
