<?php $title = 'Accueil - Recherche de Livre' ?>

<?php ob_start(); ?>

<h1>Recherche de Livre</h1>

<form method="POST" action="index.php?action=homepage_search">
    <input type="text" name="search_query" placeholder="Rechercher par titre ou auteur">
    <button type="submit">Rechercher</button>
</form>

<?php if (isset($books) && !empty($books)) { ?>
    <h2>Résultats de la recherche :</h2>
    <ul>
        <?php foreach ($books as $book) { ?>
            <img src="cover_images/<?= $book['cover_image'] ?>" alt="Couverture du livre">
            <h3><?= $book['title'] ?></h3>
            <h2><?= $book['author'] ?></h2>
            <p><?= $book['synopsis'] ?></p>
            <br>
        <?php } ?>
    </ul>
<?php } else { ?>
    <p>Aucun resultat sur la recherche</p>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>