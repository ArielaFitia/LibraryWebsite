<?php $title = 'Admin_dashboard'; ?>

<?php ob_start(); ?>

<a href="index.php?action=registerMember">Inscrire un membre</a><br>
<a href="index.php?action=registerAdmin">Inscrire un admin</a>

<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>