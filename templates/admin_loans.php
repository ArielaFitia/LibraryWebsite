<?php $title = 'admin_loans' ?>

<?php ob_start(); ?>

<?php if ($confirmationMessage !== '') { ?>
    <p><?= $confirmationMessage ?></p>
<?php } ?>

<h1>Administration des emprunts</h1>

<?php foreach ($loans as $loan) { ?>
    <div>
        <h3>Livre: <?= $loan['book_title'] ?></h3>
        <p>Emprunté par: <?= $loan['user_name'] ?></p>
        <p>Date d'emprunt: <?= $loan['loan_date'] ?></p>
        <p>Date de retour: <?= $loan['return_date'] ?></p>
        <p>Statut: <?= $loan['loan_status'] ?></p>

        <form method="POST" action="index.php?action=admin_loans">
            <input type="hidden" name="loan_id" value="<?= $loan['id'] ?>">
            <label for="loan_date">Nouvelle date d'emprunt:</label>
            <input type="date" name="loan_date" value="<?= $loan['loan_date'] ?>"><br>
            <label for="return_date">Nouvelle date de retour:</label>
            <input type="date" name="return_date" value="<?= $loan['return_date'] ?>"><br>
            <label for="loan_status">Nouveau statut:</label>
            <select name="loan_status">
                <option value="En attente" <?= ($loan['loan_status'] == 'En attente') ? 'selected' : '' ?>>En attente</option>
                <option value="En cours" <?= ($loan['loan_status'] == 'En cours') ? 'selected' : '' ?>>En cours</option>
            </select><br>
            <button type="submit">Modifier</button>
            <a href="index.php?action=delete_loan&loan_id=<?= $loan['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet emprunt ?')">Supprimer</a>
        </form>
    </div>
    <hr>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>