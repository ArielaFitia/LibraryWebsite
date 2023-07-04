<?php

session_start();

require_once('src/controllers/homepage.php');
require_once('src/controllers/homepage_books.php');
require_once('src/controllers/homepage_search.php');
require_once('src/controllers/admin_registerMember.php');
require_once('src/controllers/admin_registerAdmin.php');
require_once('src/controllers/login.php');
require_once('src/controllers/admin_dahsboard.php');
require_once('src/controllers/admin_books.php');
require_once('src/controllers/admin_addBook.php');
require_once('src/controllers/admin_members.php');
require_once('src/controllers/admin_loans.php');
require_once('src/controllers/admin_suggestions.php');
require_once('src/controllers/admin_searchBook.php');
require_once('src/controllers/admin_searchMember.php');
require_once('src/controllers/member_dashboard.php');
require_once('src/controllers/member_books.php');
require_once('src/controllers/member_search.php');
require_once('src/controllers/logout.php');

try {
    $bookRepository = new BookRepository(new DatabaseConnection());
    $loanRepository = new LoanRepository(new DatabaseConnection());
    $suggestionRepository = new SuggestionRepository(new DatabaseConnection());
    $userRepository = new UserRepository(new DatabaseConnection());

    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'homepage_books') {
            homepage_books();
        } elseif ($_GET['action'] === 'homepage_search') {
            homepage_search();
        } elseif ($_GET['action'] === 'admin_books') {
            admin_books();
        } elseif ($_GET['action'] === 'update_book') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                if (isset($_POST['title'], $_POST['author'], $_POST['synopsis'], $_POST['availability'])) {
                    $title = $_POST['title'];
                    $author = $_POST['author'];
                    $synopsis = $_POST['synopsis'];
                    $availability = $_POST['availability'];

                    // Appel à une fonction du modèle pour mettre à jour le livre
                    $bookRepository->updateBook($identifier, $title, $author, $synopsis, $availability);

                    // Redirection vers la page admin_books pour afficher les livres mis à jour
                    header('Location: index.php?action=admin_books');
                    exit;
                }
            }
        } elseif ($_GET['action'] === 'admin_addBook') {
            admin_addBook();
        } elseif ($_GET['action'] === 'registerMember') {
            registerMember();
        } elseif ($_GET['action'] === 'registerAdmin') {
            registerAdmin();
        } elseif ($_GET['action'] === 'login') {
            logged();
        } elseif ($_GET['action'] === 'admin_dashboard') {
            admin_dashboard();
        } elseif ($_GET['action'] === 'admin_members') {
            admin_members();
        } elseif ($_GET['action'] === 'update_member') {
            if (isset($_POST['member_id'], $_POST['password'], $_POST['payment_date'], $_POST['expiration_date'], $_POST['payment_option'])) {
                $memberId = $_POST['member_id'];
                $password = $_POST['password'];
                $paymentDate = $_POST['payment_date'];
                $expirationDate = $_POST['expiration_date'];
                $paymentOption = $_POST['payment_option'];

                $userRepository->updateMember($memberId, $password, $paymentDate, $expirationDate, $paymentOption);

                // Redirection vers la page d'administration des membres
                header('Location: index.php?action=admin_members');
                exit();
            } else {
                // Affichage d'un message d'erreur si les données sont incomplètes
                throw new Exception('Erreur : Veuillez fournir toutes les informations nécessaires pour la mise à jour du membre.');
            }
        } elseif ($_GET['action'] === 'delete_member' && isset($_GET['member_id'])) {
            $memberId = $_GET['member_id'];
            $userRepository->deleteMember($memberId);
            header('Location: index.php?action=admin_members');
            exit;
        } elseif ($_GET['action'] === 'admin_loans') {
            adminLoanManagement();
        } elseif ($_GET['action'] === 'delete_loan' && isset($_GET['loan_id'])) {
            $loanId = $_GET['loan_id'];
            $loanRepository->deleteLoan($loanId);
            header('Location: index.php?action=admin_loans');
            exit;
        } elseif ($_GET['action'] === 'admin_suggestions') {
            adminSuggestions();
        } elseif ($_GET['action'] === 'delete_suggestion' && isset($_GET['suggestion_id'])) {
            $suggestionId = $_GET['suggestion_id'];
            $suggestionRepository->deleteSuggestion($suggestionId);
            header('Location: index.php?action=admin_suggestions');
            exit;
        } elseif ($_GET['action'] === 'admin_searchBook') {
            admin_searchBook();
        } elseif ($_GET['action'] === 'admin_searchMember') {
            admin_searchMember();
        } elseif ($_GET['action'] === 'member_dashboard') {
            member_dashboard();
        } elseif ($_GET['action'] === 'member_books') {
            member_books();
        } elseif ($_GET['action'] === 'logout') {
            logout();
        } elseif ($_GET['action'] === 'member_search') {
            member_search();
        } else {
            throw new Exception("Erreur 404 : la page que vous recherchez n'existe pas.");
        }
    } else {
        homepage();
    }
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
