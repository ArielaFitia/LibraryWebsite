<?php $title = 'Member_dashboard'; ?>

<?php ob_start(); ?>

<?php if ($confirmationMessage !== '') { ?>
    <p><?= $confirmationMessage ?></p>
<?php } ?>

<h1>Les livres récents</h1><br>

<?php foreach ($books as $book) { ?>
    <img src="cover_images/<?= $book['cover_image'] ?>" alt="Couverture du livre">
    <h3><?= $book['title'] ?></h3>
    <h2><?= $book['author'] ?></h2>
    <p><?= $book['synopsis'] ?></p>
    <br>

    <?php if ($book['availability'] === 'Disponible') { ?>
        <form method="POST" action="index.php?action=member_dashboard">
            <input type="hidden" name="loan_book_id" value="<?= $book['id'] ?>">
            <button type="submit">Emprunter</button>
        </form>
    <?php } else if ($book['availability'] === 'Emprunté') { ?>
        <p>Ce livre est actuellement indisponible à l'emprunt.</p>
    <?php } ?>

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