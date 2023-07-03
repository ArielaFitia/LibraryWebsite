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
            'availability' => $row['availability'],
            'cover_image' => $row['cover_image']
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
            'availability' => $row['availability'],
            'cover_image' => $row['cover_image']
        ];
        $books[] = $book;
    }
    return $books;
}

function searchBook($searchQuery)
{
    $db = dbConnect();
    $statement = $db->prepare("SELECT * FROM book WHERE LOWER(title) LIKE LOWER(:query) OR LOWER(author) LIKE LOWER(:query)");
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

function addBook($title, $author, $synopsis, $availability, $coverImage)
{
    $db = dbConnect();

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

function getContribution($userId)
{
    $db = memberDbConnect();
    $statement = $db->prepare("SELECT * FROM contribution WHERE user_id = :userId");
    $statement->bindParam(':userId', $userId);
    $statement->execute();
    $contribution = $statement->fetch(PDO::FETCH_ASSOC);
    return $contribution;
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

function getLoans()
{
    $db = dbConnect();
    $query = "SELECT loan.id, loan.loan_date, loan.return_date, loan.loan_status, book.title AS book_title, user.fullname AS user_name
              FROM loan
              INNER JOIN book ON loan.book_id = book.id
              INNER JOIN user ON loan.user_id = user.id";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getLoan($memberId)
{
    $db = dbConnect();
    $statement = $db->prepare("SELECT loan.*, book.title AS book_title
                              FROM loan
                              INNER JOIN book ON loan.book_id = book.id
                              WHERE loan.user_id = :memberId");
    $statement->bindParam(':memberId', $memberId);
    $statement->execute();
    $loans = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $loans;
}

function updateLoan($loanId, $loanDate, $returnDate, $loanStatus)
{
    $db = dbConnect();
    $query = "UPDATE loan SET loan_date = :loanDate, return_date = :returnDate, loan_status = :loanStatus WHERE id = :loanId";
    $statement = $db->prepare($query);
    $statement->execute(['loanDate' => $loanDate, 'returnDate' => $returnDate, 'loanStatus' => $loanStatus, 'loanId' => $loanId]);
}

function deleteLoan($loanId)
{
    $db = dbConnect();
    $statement = $db->prepare('DELETE FROM loan WHERE id = :loanId');
    $statement->execute(['loanId' => $loanId]);
}

function createSuggestion($message, $userId, $bookId)
{
    $db = dbConnect();

    $statement = $db->prepare("INSERT INTO suggestion (message, user_id, book_id) VALUES (:message, :user_id, :book_id)");
    $statement->execute(['message' => $message, 'user_id' => $userId, 'book_id' => $bookId]);
}

function getSuggestions()
{
    $db = dbConnect();


    // Requête pour sélectionner les suggestions avec les informations nécessaires
    $query = "SELECT suggestion.id, suggestion.message, user.fullname, book.title
                  FROM suggestion
                  INNER JOIN user ON suggestion.user_id = user.id
                  INNER JOIN book ON suggestion.book_id = book.id";

    // Exécution de la requête
    $result = $db->query($query);

    // Vérification des résultats
    if ($result) {
        // Récupération des suggestions sous forme de tableau associatif
        $suggestions = $result->fetchAll(PDO::FETCH_ASSOC);
        return $suggestions;
    } else {
        throw new Exception("Une erreur s'est produite lors de la récupération des suggestions.");
    }
}

function deleteSuggestion($suggestionId)
{
    $db = dbConnect();
    $query = "DELETE FROM suggestion WHERE id = ?";
    $statement = $db->prepare($query);
    $statement->execute([$suggestionId]);
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
