<?php $title = 'Member_dashboard'; ?>

<?php ob_start(); ?>

<?php if ($confirmationMessage !== '') { ?>
    <p><?= $confirmationMessage ?></p>
<?php } ?>

<h1>Les livres récents</h1><br>

<?php foreach ($books as $book) { ?>
    <h3><?= $book['title'] ?></h3>
    <h2><?= $book['author'] ?></h2>
    <p><?= $book['synopsis'] ?></p>

    <form method="POST" action="index.php?action=member_dashboard">
        <input type="hidden" name="loan_book_id" value="<?= $book['id'] ?>">
        <button type="submit">Emprunter</button>
    </form>

    <form method="POST" action="index.php?action=member_dashboard">
        <input type="hidden" name="suggestion_book_id" value="<?= $book['id'] ?>">
        <textarea name="suggestion_message" placeholder="Votre suggestion de changement"></textarea>
        <button type="submit">Envoyer une suggestion</button>
    </form>

    <br>
<?php } ?>

<a href="index.php?action=member_books">Voir plus</a>

<?php $content = ob_get_clean(); ?>

<?php require('layout_member.php'); ?>