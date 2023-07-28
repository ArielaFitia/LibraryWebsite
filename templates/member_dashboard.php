<?php $title = 'Membre - Tableau de bord'; ?>

<?php ob_start(); ?>

<?php if ($confirmationMessage !== '') { ?>
    <div class="my-5 alert alert-success alert-dismissible fade show" role="alert">
        <?= $confirmationMessage ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<main>
    <section class="my-5">
        <div class="container">
            <h1 class="pb-5 text-center text-secondary">"Books are a uniquely portable magic." - Stephen King</h1>
            <div class="row justify-content-evenly">
                <div class="col-12 text-center">
                    <img src="public\images\stars.svg" alt="peace" width="35%">
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-evenly">
                <h2 class="pb-5 text-center">Les livres ajoutés récemment</h2>
                <?php foreach ($books as $book) { ?>
                    <div class="col-12 col-md-3 py-4 py-md-3">
                        <img src="cover_images/<?= $book->cover_image ?>" alt="couverture du livre" width="100%">
                        <h3 class="text-center py-3"><?= $book->title ?></h3>
                        <button class="btn bg-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom<?= $book->id ?>" aria-controls="offcanvasBottom<?= $book->id ?>">A propos du livre</button><br>
                        <?php if ($book->availability === 'Disponible') { ?>
                            <form method="POST" action="index.php?action=member_dashboard">
                                <input type="hidden" name="loan_book_id" value="<?= $book->id ?>">
                                <button type="submit" class="my-3 btn btn-outline-secondary">Emprunter</button>
                            </form>
                        <?php } else if ($book->availability === 'Emprunté') { ?>
                            <div class=" my-3 alert alert-warning" role="alert">
                                Indisponible à l'emprunt.
                            </div>
                        <?php } ?>

                        <div class="offcanvas offcanvas-bottom h-100" tabindex="-1" id="offcanvasBottom<?= $book->id ?>" aria-labelledby="offcanvasBottomLabel<?= $book->id ?>">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasBottomLabel<?= $book->id ?>">A propos du livre</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body small">
                                <div class="row py-4 py-md-0">
                                    <div class="col-12 col-md-4 text-center"><img src="cover_images/<?= $book->cover_image ?>" alt="couverture livre"></div>
                                    <div class="col-12 col-md-4">
                                        <h3><?= $book->title ?></h3>
                                        <h5>écrit par</h5>
                                        <h3><?= $book->author ?></h3>
                                        <h5>Synopsis :</h5>
                                        <p><?= $book->synopsis ?></p>
                                        <form method="POST" action="index.php?action=member_dashboard">
                                            <input type="hidden" name="suggestion_book_id" value="<?= $book->id ?>">
                                            <div class="form-floating">
                                                <textarea name="suggestion_message" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                                                <label for="floatingTextarea">Des remarques ou signaler des erreurs sur ce livre ?</label>
                                            </div>
                                            <button type="submit" class="mt-3 btn btn-outline-warning">Envoyer la suggestion</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="text-end mx-5 pt-5"><a class="btn btn-primary" href="index.php?action=member_books" role="button">Tous les livres</a></div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col-12 col-md-6 py-3 py-md-0">
                    <h3 class="pb-3 text-center">Mes emprunts</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Livre</th>
                                <th scope="col">Date d'emprunt</th>
                                <th scope="col">Date de retour</th>
                                <th scope="col">Statut</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach ($loans as $loan) { ?>
                                <tr>
                                    <th scope="row"><?= $loan['book_title'] ?></th>
                                    <td><?= $loan['loan_date'] ?></td>
                                    <td><?= $loan['return_date'] ?></td>
                                    <td><?= $loan['loan_status'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 col-md-6 py-3 py-md-0">
                    <h3 class="pb-3 text-center">Mes cotisations</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Date de paiement</th>
                                <th scope="col">Date d'expiration</th>
                                <th scope="col">Option de paiement</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php if ($contribution !== false) { ?>
                                <tr>
                                    <td><?= $contribution['payment_date'] ?></td>
                                    <td><?= $contribution['expiration_date'] ?></td>
                                    <td><?= $contribution['payment_option'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('layout_member.php'); ?>