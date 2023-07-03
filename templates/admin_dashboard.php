<?php $title = 'Admin_dashboard'; ?>

<?php ob_start(); ?>

<a href="index.php?action=registerMember">Inscrire un membre</a><br>
<a href="index.php?action=registerAdmin">Inscrire un admin</a>
<a href="index.php?action=admin_searchMember">Rechercher membre</a>
<a href="index.php?action=admin_searchBook">Rechercher livre</a>

<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>