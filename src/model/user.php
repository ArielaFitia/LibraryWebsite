<?php

function getMembers()
{
    $db = userDbConnect();
    $statement = $db->prepare("SELECT u.id, u.fullname, u.email, u.password, c.payment_date, c.expiration_date, c.payment_option FROM `user` AS u LEFT JOIN contribution AS c ON u.id = c.user_id WHERE u.status = 'membre'");
    $members = [];

    $statement->execute();

    while (($row = $statement->fetch())) {
        $member = [
            'id' => $row['id'],
            'fullname' => $row['fullname'],
            'email' => $row['email'],
            'password' => $row['password'],
            'payment_date' => $row['payment_date'],
            'expiration_date' => $row['expiration_date'],
            'payment_option' => $row['payment_option']
        ];
        $members[] = $member;
    }
    return $members;
}

function deleteMember($memberId)
{
    $db = userDbConnect();
    $statement = $db->prepare("DELETE FROM `user` WHERE id = :memberId");
    $statement->bindValue(':memberId', $memberId, PDO::PARAM_INT);
    $statement->execute();
}

function searchMember($searchQuery)
{
    $db = userDbConnect();
    $statement = $db->prepare("SELECT u.*, c.payment_date, c.expiration_date, c.payment_option 
                              FROM user u 
                              LEFT JOIN contribution c ON u.id = c.user_id
                              WHERE u.id LIKE :query AND u.status = 'membre'");
    $searchParam = "%$searchQuery%";
    $statement->bindParam(':query', $searchParam);
    $statement->execute();
    $members = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $members;
}

function updateMember($memberId, $password, $paymentDate, $expirationDate, $paymentOption)
{
    $db = userDbConnect();
    $statement = $db->prepare("UPDATE `user` SET password = :password WHERE id = :memberId");
    $statement->bindParam(':password', $password);
    $statement->bindParam(':memberId', $memberId);
    $statement->execute();

    $statement = $db->prepare("UPDATE contribution SET payment_date = :paymentDate, expiration_date = :expirationDate, payment_option = :paymentOption WHERE user_id = :memberId");
    $statement->bindParam(':paymentDate', $paymentDate);
    $statement->bindParam(':expirationDate', $expirationDate);
    $statement->bindParam(':paymentOption', $paymentOption);
    $statement->bindParam(':memberId', $memberId);
    $statement->execute();
}

function addMember()
{
    $db = userDbConnect();
    // Traitement du formulaire d'inscription
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération des données du formulaire
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $payment_date = $_POST['payment_date'];
        $expiration_date = $_POST['expiration_date'];
        $payment_option = $_POST['payment_option'];

        // Insertion des données dans la table "user"
        $statement = $db->prepare('INSERT INTO user (fullname, email, password, status) VALUES (?, ?, ?, ?)');
        $statement->execute([$fullname, $email, $password, 'membre']);

        // Récupération de l'ID de l'utilisateur inséré
        $user_id = $db->lastInsertId();

        // Insertion des informations de contribution dans la table "contribution"
        $statement = $db->prepare('INSERT INTO contribution (payment_date, expiration_date, payment_option, user_id) VALUES (?, ?, ?, ?)');
        $statement->execute([$payment_date, $expiration_date, $payment_option, $user_id]);

        // Affichage d'un message de succès
        echo "Inscription réussie !";
    }
}

function addAdmin()
{
    $db = userDbConnect();
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
    $db = userDbConnect();
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
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['fullname'] = $user['fullname']; // Ajout de la ligne de la session
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

function userDbConnect()
{

    $db = new PDO('mysql:host=localhost;dbname=library_website;charset=utf8', 'root', 'root');
    return $db;
}
