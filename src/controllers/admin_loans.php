<?php

require_once('src/lib/database.php');
require_once('src/model/loan.php');

function adminLoanManagement()
{
    $loanRepository = new LoanRepository(new DatabaseConnection());
    $loans = $loanRepository->getLoans();
    $confirmationMessage = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loan_id'])) {
        $loanId = $_POST['loan_id'];
        $loanDate = $_POST['loan_date'];
        $returnDate = $_POST['return_date'];
        $loanStatus = $_POST['loan_status'];

        $loanRepository->updateLoan($loanId, $loanDate, $returnDate, $loanStatus);

        $confirmationMessage = 'Les informations de l\'emprunt ont été mises à jour.';
    }

    require('templates/admin_loans.php');
}
