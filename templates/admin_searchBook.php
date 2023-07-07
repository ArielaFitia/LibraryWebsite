<?php $title = 'Admin - Recherche de Livre' ?>

<?php ob_start(); ?>

<section class="my-5">
    <div class="container-fluid">
        <form method="POST" action="index.php?action=admin_searchBook" class="d-flex text-center" role="search">
            <input class="form-control me-2" name="search_query" type="search" placeholder="Rechercher par un titre ou un auteur" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Rechercher</button>
        </form>
    </div>
</section>
<?php if (isset($books) && !empty($books)) { ?>
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-evenly">
                <h2 class="pb-3 text-center">Résultats de la recherche</h2>
                <?php foreach ($books as $book) { ?>
                    <div class="col-3 py-3">
                        <img src="cover_images/<?= $book['cover_image'] ?>" alt="couverture du livre" width="100%">
                        <h3 class="text-center py-3"><?= $book['title'] ?></h3>
                        <button class="btn bg-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom<?= $book['id'] ?>" aria-controls="offcanvasBottom<?= $book['id'] ?>">A propos du livre</button><br>
                        <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $book['id'] ?>">
                            Modifier
                        </button>

                        <div class="modal fade" id="exampleModal<?= $book['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Quelques choses à modifier ?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="index.php?action=update_book&id=<?= $book['id'] ?>">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Titre</label>
                                                <input type="text" class="form-control" id="recipient-name" name="title" value="<?= $book['title'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name1" class="col-form-label">Auteur</label>
                                                <input type="text" class="form-control" id="recipient-name1" name="author" value="<?= $book['author'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Synopsis</label>
                                                <textarea class="form-control" id="message-text" rows="4" name="synopsis"><?= $book['synopsis'] ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="availability" class="form-label">Disponibilité</label>
                                                <select name="availability" class="form-select">
                                                    <option value="Disponible" <?= ($book['availability'] === 'Disponible') ? 'selected' : '' ?>>Disponible</option>
                                                    <option value="Emprunté" <?= ($book['availability'] === 'Emprunté') ? 'selected' : '' ?>>Emprunté</option>
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


                        <div class="offcanvas offcanvas-bottom h-100" tabindex="-1" id="offcanvasBottom<?= $book['id'] ?>" aria-labelledby="offcanvasBottomLabel<?= $book['id'] ?>">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasBottomLabel<?= $book['id'] ?>">A propos du livre</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body small">
                                <div class="row">
                                    <div class="col-4 text-center"><img src="cover_images/<?= $book['cover_image'] ?>" alt="couverture livre"></div>
                                    <div class="col-4">
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

<?php require('layout_admin.php'); ?>