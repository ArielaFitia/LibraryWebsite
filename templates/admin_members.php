<?php $title = 'admin_members' ?>

<?php ob_start(); ?>

<?php foreach ($members as $member) { ?>
    <h1><?= $member['id'] ?></h1>
    <h1><?= $member['fullname'] ?></h1>
    <h1><?= $member['email'] ?></h1>
    <h1><?= $member['password'] ?></h1>
    <br>
    <form method="POST" action="index.php?action=delete_member&amp;member_id=<?= $member['id']; ?>" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?')">
        <button type="submit" name="delete_member">Supprimer</button>
    </form>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>