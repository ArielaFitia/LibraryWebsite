<?php

function createSuggestion($message, $userId, $bookId)
{
    $db = suggestionDbConnect();

    $statement = $db->prepare("INSERT INTO suggestion (message, user_id, book_id) VALUES (:message, :user_id, :book_id)");
    $statement->execute(['message' => $message, 'user_id' => $userId, 'book_id' => $bookId]);
}

function getSuggestions()
{
    $db = suggestionDbConnect();


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
    $db = suggestionDbConnect();
    $query = "DELETE FROM suggestion WHERE id = ?";
    $statement = $db->prepare($query);
    $statement->execute([$suggestionId]);
}

function suggestionDbConnect()
{

    $db = new PDO('mysql:host=localhost;dbname=library_website;charset=utf8', 'root', 'root');
    return $db;
}
