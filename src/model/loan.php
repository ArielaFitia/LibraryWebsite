<?php

function createLoan($userId, $bookId)
{
    $db = loanDbConnect();
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
    $db = loanDbConnect();
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
    $db = loanDbConnect();
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
    $db = loanDbConnect();
    $query = "UPDATE loan SET loan_date = :loanDate, return_date = :returnDate, loan_status = :loanStatus WHERE id = :loanId";
    $statement = $db->prepare($query);
    $statement->execute(['loanDate' => $loanDate, 'returnDate' => $returnDate, 'loanStatus' => $loanStatus, 'loanId' => $loanId]);
}

function deleteLoan($loanId)
{
    $db = loanDbConnect();
    $statement = $db->prepare('DELETE FROM loan WHERE id = :loanId');
    $statement->execute(['loanId' => $loanId]);
}

function loanDbConnect()
{

    $db = new PDO('mysql:host=localhost;dbname=library_website;charset=utf8', 'root', 'root');
    return $db;
}
