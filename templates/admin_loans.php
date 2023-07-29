<?php $title = 'Bibliothecaire - emprunts' ?>

<?php ob_start(); ?>

<?php if ($confirmationMessage !== '') { ?>
    <div class="my-5 alert alert-success alert-dismissible fade show" role="alert">
        <?= $confirmationMessage ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<section class="my-5">
    <h2 class="pb-3 text-center">Administration des emprunts</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Livre</th>
                <th scope="col">Emprunté par</th>
                <th scope="col">Date d'emprunt</th>
                <th scope="col">Date de retour</th>
                <th scope="col">Statut</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($loans as $loan) { ?>
                <tr>
                    <th scope="row"><?= $loan['book_title'] ?></th>
                    <td><?= $loan['user_name'] ?></td>
                    <td><?= $loan['loan_date'] ?></td>
                    <td><?= $loan['return_date'] ?></td>
                    <td><?= $loan['loan_status'] ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $loan['id'] ?>">
                            Gérer
                        </button>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="index.php?action=delete_loan&loan_id=<?= $loan['id'] ?>" role="button" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet emprunt ?')">Supprimer</a>
                    </td>

                    <div class="modal fade" id="exampleModal<?= $loan['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Quelques choses à modifier ?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="index.php?action=admin_loans">
                                        <input type="hidden" name="loan_id" value="<?= $loan['id'] ?>">
                                        <div class="mb-3">
                                            <label for="recipient-name1" class="col-form-label">Date d'emprunt</label>
                                            <input type="date" class="form-control" id="recipient-name1" name="loan_date" value="<?= $loan['loan_date'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name2" class="col-form-label">Date d'expiration</label>
                                            <input type="date" class="form-control" id="recipient-name2" name="return_date" value="<?= $loan['return_date'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="loan_status" class="form-label">Statut</label>
                                            <select name="loan_status" class="form-select">
                                                <option value="En attente" <?= ($loan['loan_status'] == 'En attente') ? 'selected' : '' ?>>En attente</option>
                                                <option value="En cours" <?= ($loan['loan_status'] == 'En cours') ? 'selected' : '' ?>>En cours</option>
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
            <?php } ?>
        </tbody>
    </table>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>