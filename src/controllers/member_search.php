<?php

require_once('src/model/book.php');
require_once('src/model/loan.php');
require_once('src/model/suggestion.php');

function member_search()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php?action=login');
        exit();
    }

    $userName = $_SESSION['fullname'];
    $userId = $_SESSION['user_id'];
    if (isset($_POST['search_query'])) {
        $searchQuery = $_POST['search_query'];
        $books = searchBook($searchQuery);
    }

    $confirmationMessage = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['loan_book_id'])) {
            $bookId = $_POST['loan_book_id'];
            $userId = $_SESSION['user_id'];

            createLoan($userId, $bookId);

            // Message de confirmation
            $confirmationMessage = 'L\'emprunt est en attente de confirmation, veuillez vous rendre à notre établissement.';
        } elseif (isset($_POST['suggestion_book_id'], $_POST['suggestion_message'])) {
            $bookId = $_POST['suggestion_book_id'];
            $userId = $_SESSION['user_id'];
            $suggestionMessage = $_POST['suggestion_message'];

            createSuggestion($suggestionMessage, $userId, $bookId);

            // Message de confirmation
            $confirmationMessage = 'Votre suggestion a été envoyée avec succès.';
        }
    }

    require('templates/member_search.php');
}
