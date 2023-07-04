<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

<h1>Les livres recents</h1><br>
<?php foreach ($books as $book) { ?>
    <img src="cover_images/<?= $book->cover_image ?>" alt="Couverture du livre">
    <h3><?= $book->title ?></h3>
    <h2><?= $book->author ?></h2>
    <p><?= $book->synopsis ?></p>
    <br>
<?php } ?>
<a href="index.php?action=homepage_books">Voir plus</a>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>