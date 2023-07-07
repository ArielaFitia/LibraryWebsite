<?php $title = 'Admin - Recherche de membre' ?>

<?php ob_start(); ?>

<section class="my-5">
    <div class="container-fluid">
        <form method="POST" action="index.php?action=admin_searchMember" class="d-flex text-center" role="search">
            <input class="form-control me-2" name="search_query" type="search" placeholder="Rechercher par l'identifiant du membre" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Rechercher</button>
        </form>
    </div>
</section>
<?php if (isset($members) && !empty($members)) { ?>
    <section class="my-5">
        <h2 class="pb-3 text-center">Résultat de la recherche</h2>
        <?php foreach ($members as $member) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom complet</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mot de passe</th>
                        <th scope="col">Date de paiement</th>
                        <th scope="col">Date d'expiration</th>
                        <th scope="col">Option actuelle</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?= $member['id'] ?></th>
                        <td><?= $member['fullname'] ?></td>
                        <td><?= $member['email'] ?></td>
                        <td><?= $member['password'] ?></td>
                        <td><?= $member['payment_date'] ?></td>
                        <td><?= $member['expiration_date'] ?></td>
                        <td><?= $member['payment_option'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $member['id'] ?>">
                                Modifier
                            </button>
                        </td>
                        <td>
                            <form method="POST" action="index.php?action=delete_member&amp;member_id=<?= $member['id']; ?>" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?')">
                                <button type="submit" class="btn btn-danger" name="delete_member">Supprimer</button>
                            </form>
                        </td>

                        <div class="modal fade" id="exampleModal<?= $member['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Quelques choses à modifier ?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="index.php?action=update_member">
                                            <input type="hidden" name="member_id" value="<?= $member['id'] ?>">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Mot de passe</label>
                                                <input type="password" class="form-control" id="recipient-name" name="password">
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name1" class="col-form-label">Date de paiement</label>
                                                <input type="date" class="form-control" id="recipient-name1" name="payment_date" value="<?= $member['payment_date'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name2" class="col-form-label">Date d'expiration</label>
                                                <input type="date" class="form-control" id="recipient-name2" name="expiration_date" value="<?= $member['expiration_date'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="payment_option" class="form-label">Option de paiement</label>
                                                <select name="payment_option" class="form-select">
                                                    <option value="Paiement en deux tranches" <?= ($member['payment_option'] === 'Paiement en deux tranches') ? 'selected' : '' ?>>Paiment en deux tranches</option>
                                                    <option value="Paiement en une seule fois" <?= ($member['payment_option'] === 'Paiement en une seule fois') ? 'selected' : '' ?>>Paiment en une seule fois</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                </tbody>
            </table>

    </section>
<?php } ?>
<?php } else { ?>
    <section class="py-2">
        <div class="text-center container">
            <img src="public\images\people_search.svg" alt="rechercher_membre" width="50%">
        </div>
    </section>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>