<?php $title = 'Admin - Suggestions'; ?>

<?php ob_start(); ?>

<h1>Admin - Suggestions</h1>

<?php foreach ($suggestions as $suggestion) { ?>
    <div>
        <h3><?= $suggestion['title'] ?></h3>
        <p>Auteur : <?= $suggestion['fullname'] ?></p>
        <p>Message : <?= $suggestion['message'] ?></p>

        <form method="POST" action="index.php?action=delete_suggestion&amp;suggestion_id=<?= $suggestion['id']; ?>" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette suggestion ?')">
            <button type="submit" name="delete_suggestion">Supprimer</button>
        </form>
    </div>
    <hr>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>