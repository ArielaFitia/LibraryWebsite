<?php

require_once('src/controllers/homepage.php');
require_once('src/controllers/homepage_books.php');
require_once('src/controllers/homepage_search.php');
require_once('src/controllers/admin_registerMember.php');
require_once('src/controllers/admin_registerAdmin.php');
require_once('src/controllers/login.php');
require_once('src/controllers/admin_dahsboard.php');
require_once('src/controllers/admin_books.php');
require_once('src/controllers/admin_members.php');

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'homepage_books') {
            homepage_books();
        } elseif ($_GET['action'] === 'homepage_search') {
            homepage_search();
        } elseif ($_GET['action'] === 'admin_books') {
            admin_books();
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
        } elseif ($_GET['action'] === 'delete_member' && isset($_GET['member_id'])) {
            $memberId = $_GET['member_id'];
            deleteMember($memberId);
            header('Location: index.php?action=admin_members');
            exit;
        } else {
            throw new Exception("Erreur 404 : la page que vous recherchez n'existe pas.");
        }
    } else {
        homepage();
    }
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
