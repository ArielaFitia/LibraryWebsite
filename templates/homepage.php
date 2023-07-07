<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
<main>
    <section class="my-5">
        <div class="container bg-primary ">
            <div class="row">
                <div class="col-6 align-self-center">
                    <h1>Inkwell <br> Library</h1>
                    <h3>Inkwell Library est une bibliothèque où l'écriture et la créativité prennent vie.
                        Trouvez ! empruntez ! lisez !</h3>
                    <div class="pt-3"><a class="btn bg-secondary" href="#" role="button">En savoir plus</a></div>
                </div>
                <div class="col-6">
                    <img src="public\images\reading_time.png" alt="illustration lecture" width="100%">
                </div>
            </div>
        </div>
    </section>
    <section id="a_propos" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-6 align-self-center">
                    <h2 class="pb-3">A propos</h2>
                    <p>Inkwell Library est bien plus qu'une simple bibliothèque. Nous sommes un espace où les mots prennent vie, où les esprits s'éveillent et où les histoires prennent forme. Notre mission est de fournir un refuge littéraire pour les amoureux des livres, un lieu d'inspiration et de découverte. Avec notre vaste collection de livres, nos événements culturels stimulants et notre communauté passionnée, nous invitons chacun à plonger dans le monde merveilleux de la lecture et de l'imagination. Rejoignez-nous et laissez votre curiosité s'épanouir à Inkwell Library.</p>
                    <div class="pt-3"><a class="btn btn-primary" href="#" role="button">En savoir plus</a></div>
                </div>
                <div class="col-6">
                    <img src="public\images\a_propos.jpg" alt="rayon livres" width="100%">
                </div>
            </div>
        </div>
    </section>
    <section id="services" class="py-5">
        <div class="container bg-primary py-5">
            <div class="row justify-content-evenly">
                <h2 class="pb-4 text-center">Nos services</h2>
                <div class="col-3 py-4 px-3 bg-primary-subtle">
                    <h3 class="text-center">Services</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a odio euismod urna pellentesque mattis non et erat. Nulla facilisi. Nam enim neque, euismod euismod accumsan nec, tristique id lacus.</p>
                </div>
                <div class="col-3 py-4 px-3 bg-primary-subtle">
                    <h3 class="text-center">Services</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a odio euismod urna pellentesque mattis non et erat. Nulla facilisi. Nam enim neque, euismod euismod accumsan nec, tristique id lacus.</p>
                </div>
                <div class="col-3 py-4 px-3 bg-primary-subtle">
                    <h3 class="text-center">Services</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a odio euismod urna pellentesque mattis non et erat. Nulla facilisi. Nam enim neque, euismod euismod accumsan nec, tristique id lacus.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <h2 class="pb-5 text-center">Comment ça marche ?</h2>
                <div class="col-6">
                    <img src="public\images\organization.png" alt="organisation" width="100%">
                </div>
                <div class="col-6">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Subheading</div>
                                Content for list item
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Subheading</div>
                                Content for list item
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Subheading</div>
                                Content for list item
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Subheading</div>
                                Content for list item
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Subheading</div>
                                Content for list item
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-evenly">
                <h2 class="pb-5 text-center">Les livres ajoutés récemment</h2>
                <?php foreach ($books as $book) { ?>
                    <div class="col-3">
                        <img src="cover_images/<?= $book->cover_image ?>" alt="couverture du livre" width="100%">
                        <h3 class="text-center py-3"><?= $book->title ?></h3>
                        <button class="btn bg-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom<?= $book->id ?>" aria-controls="offcanvasBottom<?= $book->id ?>">A propos du livre</button>

                        <div class="offcanvas offcanvas-bottom h-100" tabindex="-1" id="offcanvasBottom<?= $book->id ?>" aria-labelledby="offcanvasBottomLabel<?= $book->id ?>">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasBottomLabel<?= $book->id ?>">A propos du livre</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body small">
                                <div class="row">
                                    <div class="col-4 text-center"><img src="cover_images/<?= $book->cover_image ?>" alt="couverture livre"></div>
                                    <div class="col-4">
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
            <div class="text-end mx-5 pt-5"><a class="btn btn-primary" href="index.php?action=homepage_books" role="button">Tous les livres</a></div>
        </div>
    </section>
    <section id="contacts" class="py-5">
        <div class="container text-center">
            <h2 class="pb-5">Contactez-nous</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a odio euismod urna pellentesque mattis non et erat. Nulla facilisi.</p>
        </div>
    </section>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>