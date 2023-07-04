<?php

function getContribution($userId)
{
    $db = contributionDbConnect();
    $statement = $db->prepare("SELECT * FROM contribution WHERE user_id = :userId");
    $statement->bindParam(':userId', $userId);
    $statement->execute();
    $contribution = $statement->fetch(PDO::FETCH_ASSOC);
    return $contribution;
}

function contributionDbConnect()
{

    $db = new PDO('mysql:host=localhost;dbname=library_website;charset=utf8', 'root', 'root');
    return $db;
}
