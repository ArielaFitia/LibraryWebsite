<?php $title = 'Member_books'; ?>

<?php ob_start(); ?>

<?php if ($confirmationMessage !== '') { ?>
    <p><?= $confirmationMessage ?></p>
<?php } ?>

<h1>Tous les livres</h1><br>


<?php foreach ($books as $book) { ?>
    <h3><?= $book['title'] ?></h3>
    <h2><?= $book['author'] ?></h2>
    <p><?= $book['synopsis'] ?></p>

    <form method="POST" action="index.php?action=member_books">
        <input type="hidden" name="loan_book_id" value="<?= $book['id'] ?>">
        <button type="submit">Emprunter</button>
    </form>

    <br>
<?php } ?>


<?php $content = ob_get_clean(); ?>

<?php require('layout_member.php'); ?>