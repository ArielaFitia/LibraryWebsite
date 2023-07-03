<?php

function getMembers()
{
    $db = memberDbConnect();
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
    $db = memberDbConnect();
    $statement = $db->prepare("DELETE FROM `user` WHERE id = :memberId");
    $statement->bindValue(':memberId', $memberId, PDO::PARAM_INT);
    $statement->execute();
}

function updateMember($memberId, $password, $paymentDate, $expirationDate, $paymentOption)
{
    $db = memberDbConnect();
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
    $db = memberDbConnect();
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

function memberDbConnect()
{

    $db = new PDO('mysql:host=localhost;dbname=library_website;charset=utf8', 'root', 'root');
    return $db;
}
