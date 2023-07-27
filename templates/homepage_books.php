<?php $title = 'Accueil-Les livres'; ?>

<?php ob_start(); ?>

<section class="my-5">
    <div class="container">
        <div class="row row-cols">
            <h2 class="pb-3 text-center">Nos livres</h2>
            <?php foreach ($books as $book) { ?>
                <div class="col-12 col-md-3 py-4 py-md-3">
                    <img src="cover_images/<?= $book->cover_image ?>" alt="couverture du livre" width="100%">
                    <h3 class="text-center py-3"><?= $book->title ?></h3>
                    <button class="btn bg-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom<?= $book->id ?>" aria-controls="offcanvasBottom<?= $book->id ?>">A propos du livre</button>

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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php');
