<?php $title = 'Member_books'; ?>

<?php ob_start(); ?>

<?php if ($confirmationMessage !== '') { ?>
    <div class="my-5 alert alert-success alert-dismissible fade show" role="alert">
        <?= $confirmationMessage ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<main>
    <section class="my-5">
        <a class="ms-5 btn btn-secondary" href="index.php?action=member_dashboard" role="button">Retour</a>
        <div class="container">
            <div class="row row-cols">
                <h2 class="pb-5 text-center">Tous les livres</h2>
                <?php foreach ($books as $book) { ?>
                    <div class="col-3">
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
                                <div class="row">
                                    <div class="col-4"><img src="cover_images/<?= $book->cover_image ?>" alt="couverture livre"></div>
                                    <div class="col-4">
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
        </div>
    </section>
</main>




<?php $content = ob_get_clean(); ?>

<?php require('layout_member.php'); ?>