<?php $title = 'Member_dashboard'; ?>

<?php ob_start(); ?>

<h1>Les livres recents</h1><br>
<?php foreach ($books as $book) { ?>
    <h3><?= $book['title'] ?></h3>
    <h2><?= $book['author'] ?></h2>
    <p><?= $book['synopsis'] ?></p>
    <br>
<?php } ?>
<a href="">Voir plus</a>

<?php $content = ob_get_clean(); ?>

<?php require('layout_member.php'); ?>