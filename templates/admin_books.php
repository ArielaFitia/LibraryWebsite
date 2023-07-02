<?php $title = 'admin_books' ?>

<?php ob_start(); ?>

<?php foreach ($books as $book) { ?>
    <h3><?= $book['title'] ?></h3>
    <h2><?= $book['author'] ?></h2>
    <p><?= $book['synopsis'] ?></p>

    <form method="POST" action="index.php?action=update_book&id=<?= $book['id'] ?>">
        <label for="title">Titre:</label>
        <input type="text" name="title" value="<?= $book['title'] ?>">
        <label for="author">Auteur:</label>
        <input type="text" name="author" value="<?= $book['author'] ?>">
        <label for="synopsis">Synopsis:</label>
        <textarea name="synopsis"><?= $book['synopsis'] ?></textarea>
        <label for="availability">Disponibilité:</label>
        <select name="availability">
            <option value="Disponible" <?= ($book['availability'] === 'Disponible') ? 'selected' : '' ?>>Disponible</option>
            <option value="Emprunté" <?= ($book['availability'] === 'Emprunté') ? 'selected' : '' ?>>Emprunté</option>
        </select>
        <button type="submit">Modifier</button>
    </form>

    <br>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>