<?php $title = 'Admin - Recherche de Livre' ?>

<?php ob_start(); ?>

<h1>Recherche de Livre</h1>

<form method="POST" action="index.php?action=admin_searchBook">
    <input type="text" name="search_query" placeholder="Rechercher par titre ou auteur">
    <button type="submit">Rechercher</button>
</form>

<?php if (isset($books) && !empty($books)) { ?>
    <h2>Résultats de la recherche :</h2>
    <?php foreach ($books as $book) { ?>
        <img src="cover_images/<?= $book['cover_image'] ?>" alt="Couverture du livre">
        <h3><?= $book['title'] ?></h3>
        <h2><?= $book['author'] ?></h2>
        <p><?= $book['synopsis'] ?></p>
        <br>

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

<?php } else { ?>
    <p>Aucun resultat sur la recherche</p>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>