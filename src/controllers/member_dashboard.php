<?php

require_once('src/model.php');

function member_dashboard()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php?action=login');
        exit();
    }

    $userName = $_SESSION['fullname'];
    $books = getBooks();
    $confirmationMessage = '';
    $userId = $_SESSION['user_id'];

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

    // Récupérer les emprunts du membre connecté
    $loans = getLoan($userId);

    // Récupérer les informations de cotisation du membre connecté
    $contribution = getContribution($userId);

    require('templates/member_dashboard.php');
}
