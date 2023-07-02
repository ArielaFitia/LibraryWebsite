<?php

require_once('src/model.php');

function member_search()
{
    if (isset($_POST['search_query'])) {
        $searchQuery = $_POST['search_query'];
        $books = searchBook($searchQuery);
    }

    $confirmationMessage = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loan_book_id'])) {
        $bookId = $_POST['loan_book_id'];
        $userId = $_SESSION['user_id'];

        createLoan($userId, $bookId);

        // Message de confirmation
        $confirmationMessage = 'L\'emprunt est en attente de confirmation, veuillez vous rendre à notre établissement.';
    }

    require('templates/member_search.php');
}
