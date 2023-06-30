<?php $title = 'Accueil-Les livres'; ?>

<?php ob_start(); ?>

<h1>Tous les livres</h1><br>
<?php foreach ($books as $book) { ?>
    <h3><?= $book['title'] ?></h3>
    <h2><?= $book['author'] ?></h2>
    <p><?= $book['synopsis'] ?></p>
    <br>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php');
