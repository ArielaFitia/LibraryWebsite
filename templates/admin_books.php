<?php $title = 'admin_books' ?>

<?php ob_start(); ?>

<?php foreach ($books as $book) { ?>
    <h3><?= $book['title'] ?></h3>
    <h2><?= $book['author'] ?></h2>
    <p><?= $book['synopsis'] ?></p>
    <br>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>