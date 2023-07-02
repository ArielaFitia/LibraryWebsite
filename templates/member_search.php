<?php $title = 'Accueil - Recherche de Livre' ?>

<?php ob_start(); ?>

<?php if ($confirmationMessage !== '') { ?>
    <p><?= $confirmationMessage ?></p>
<?php } ?>

<h1>Recherche de Livre</h1>

<form method="POST" action="index.php?action=member_search">
    <input type="text" name="search_query" placeholder="Rechercher par titre ou auteur">
    <button type="submit">Rechercher</button>
</form>

<?php if (isset($books) && !empty($books)) { ?>
    <h2>Résultats de la recherche :</h2>
    <ul>
        <?php foreach ($books as $book) { ?>
            <li><?= $book['title'] ?> - <?= $book['author'] ?></li>
        <?php } ?>
    </ul>
    <form method="POST" action="index.php?action=member_search">
        <input type="hidden" name="loan_book_id" value="<?= $book['id'] ?>">
        <button type="submit">Emprunter</button>
    </form>

    <form method="POST" action="index.php?action=member_search">
        <input type="hidden" name="suggestion_book_id" value="<?= $book['id'] ?>">
        <textarea name="suggestion_message" placeholder="Votre suggestion de changement"></textarea>
        <button type="submit">Envoyer une suggestion</button>
    </form>

    <br>
<?php }  ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout_member.php'); ?>