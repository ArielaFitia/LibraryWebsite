<?php $title = 'Admin - Recherche de membre' ?>

<?php ob_start(); ?>

<h1>Recherche de membre</h1>

<form method="POST" action="index.php?action=admin_searchMember">
    <input type="text" name="search_query" placeholder="Rechercher par un identifiant">
    <button type="submit">Rechercher</button>
</form>

<?php if (isset($members) && !empty($members)) { ?>
    <h2>Résultats de la recherche :</h2>
    <?php foreach ($members as $member) { ?>
        <h1><?= $member['id'] ?></h1>
        <h1><?= $member['fullname'] ?></h1>
        <h1><?= $member['email'] ?></h1>
        <h1><?= $member['password'] ?></h1>
        <h1>Date de paiement : <?= $member['payment_date'] ?></h1>
        <h1>Date d'expiration : <?= $member['expiration_date'] ?></h1>
        <h1>Option de paiement : <?= $member['payment_option'] ?></h1>

        <br>

        <form method="POST" action="index.php?action=update_member">
            <input type="hidden" name="member_id" value="<?= $member['id'] ?>">

            <label for="password">Mot de passe :</label>
            <input type="password" name="password">

            <label for="payment_date">Date de paiement :</label>
            <input type="date" name="payment_date" value="<?= $member['payment_date'] ?>">

            <label for="expiration_date">Date d'expiration :</label>
            <input type="date" name="expiration_date" value="<?= $member['expiration_date'] ?>">

            <label for="payment_option">Option de paiement :</label>
            <select name="payment_option">
                <option value="Paiement en deux tranches" <?= ($member['payment_option'] === 'Paiement en deux tranches') ? 'selected' : '' ?>>Paiement en deux tranches</option>
                <option value="Paiement en une seule fois" <?= ($member['payment_option'] === 'Paiement en une seule fois') ? 'selected' : '' ?>>Paiement en une seule fois</option>
            </select>

            <button type="submit">Modifier</button>
        </form>

        <form method="POST" action="index.php?action=delete_member&amp;member_id=<?= $member['id']; ?>" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?')">
            <button type="submit" name="delete_member">Supprimer</button>
        </form>

        <br>
    <?php } ?>
<?php } else { ?>
    <p>Aucun resultat sur la recherche</p>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>