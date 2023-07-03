<?php $title = 'Admin - Ajouter un livre'; ?>

<?php ob_start(); ?>

<?php if ($confirmationMessage !== '') { ?>
    <p><?= $confirmationMessage ?></p>
<?php } ?>

<h1>Admin - Ajouter un livre</h1>

<form method="POST" action="index.php?action=admin_addBook" enctype="multipart/form-data">
    <label for="title">Titre :</label>
    <input type="text" name="title" required><br>

    <label for="author">Auteur :</label>
    <input type="text" name="author" required><br>

    <label for="synopsis">Synopsis :</label>
    <textarea name="synopsis" required></textarea><br>

    <label for="availability">Disponibilité :</label>
    <select name="availability">
        <option value="Disponible">Disponible</option>
        <option value="Emprunté">Emprunté</option>
    </select><br>

    <label for="cover_image">Image de couverture :</label>
    <input type="file" name="cover_image"><br>

    <input type="submit" value="Ajouter">
</form>

<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>