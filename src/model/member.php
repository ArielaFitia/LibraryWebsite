<?php

function getMembers()
{
    $db = memberDbConnect();
    $statement = $db->prepare("SELECT * FROM `user` WHERE status = 'membre'");
    $members = [];

    $statement->execute();

    while (($row = $statement->fetch())) {
        $member = [
            'id' => $row['id'],
            'fullname' => $row['fullname'],
            'email' => $row['email'],
            'password' => $row['password']
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
