<?php $title = 'Accueil - Recherche de Livre' ?>

<?php ob_start(); ?>

<section class="my-5">
    <div class="container-fluid">
        <form method="POST" action="index.php?action=homepage_search" class="d-flex text-center" role="search">
            <input class="form-control me-2" name="search_query" type="search" placeholder="Rechercher par titre ou auteur" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Rechercher</button>
        </form>
    </div>
</section>


<?php if (isset($books) && !empty($books)) { ?>
    <section class="mb-5">
        <div class="container">
            <div class="row justify-content-evenly">
                <h2 class="pb-5 text-center">Résultat de la recherche :</h2>
                <?php foreach ($books as $book) { ?>
                    <div class="col-12 col-md-3 py-4 py-md-3">
                        <img src="cover_images/<?= $book['cover_image'] ?>" alt="couverture du livre" width="100%">
                        <h3 class="text-center py-3"><?= $book['title'] ?></h3>
                        <button class="btn bg-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom<?= $book['id'] ?>" aria-controls="offcanvasBottom<?= $book['id'] ?>">A propos du livre</button>

                        <div class="offcanvas offcanvas-bottom h-100" tabindex="-1" id="offcanvasBottom<?= $book['id'] ?>" aria-labelledby="offcanvasBottomLabel<?= $book['id'] ?>">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasBottomLabel<?= $book['id'] ?>">A propos du livre</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body small">
                                <div class="row py-4 py-md-0">
                                    <div class="col-12 col-md-4 text-center"><img src="cover_images/<?= $book['cover_image'] ?>" alt="couverture livre"></div>
                                    <div class="col-12 col-md-4">
                                        <h3><?= $book['title'] ?></h3>
                                        <h5>écrit par</h5>
                                        <h3><?= $book['author'] ?></h3>
                                        <h5>Synopsis :</h5>
                                        <p><?= $book['synopsis'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section class="py-2">
        <div class="text-center container">
            <img src="public\images\bookshelves.svg" alt="bookshelves" width="50%">
        </div>
    </section>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>