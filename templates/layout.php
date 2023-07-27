<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <header class="py-4">
        <nav class="navbar navbar-expand-md fixed-top navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="public\images\inkwellly.png" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#a_propos">A propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#contacts">Contacts</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav mb-2 mb-lg-0 text-center me-3">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=homepage_search"><img src="public\images\search.svg" alt="search"></a>
                    </li>
                </ul>
                <form class="justify-content-end">
                    <a href="index.php?action=login" target="_blank">
                        <button class="btn btn-outline-primary me-2" type="button">Se connecter</button>
                    </a>
                </form>
            </div>
        </nav>
    </header>

    <?= $content ?>

    <footer class="border-top bg-secondary mb-0">
        <div class="container py-5">
            <div class="row gy-4 align-items-center mb-0">
                <div class="col-12 col-md-4">
                    <a class="navbar-brand" href="#"><img src="public\images\inkwellly.png" alt="logo"></a>
                </div>
                <div class="col-12 col-md-4 text-md-center">
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#mentionsLegales">Mentions légales</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 text-md-end">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="https://fr-fr.facebook.com/" target="_blank"><img src="public\images\facebook-1.png" alt="facebook"></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/" target="_blank"><img src="public\images\instagram-1.png" alt="instagram"></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://twitter.com/?lang=fr" target="_blank"><img src="public\images\twitter-1.png" alt="twitter"></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="modal fade" id="mentionsLegales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Mentions Légales</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Ce site étant conçu initialement dans le but de respecter et de suivre les conformes demandées pour le projet NFA021.
                                Toutefois je prendrai la liberté de poursuivre sa conception en rajoutant des nouvelles fonctionnalités,
                                dans l'objectif de toujours m'améliorer et de pouvoir montrer sa finalité parmis mes projets.
                            </p>
                            <p>
                                Je suis ouvert à vos suggestions et contributions.
                            <h3 class="fw-bold">Contactez-moi :</h3>
                            Email: <span class="text-secondary">arielafitiajoharini@gmail.com</span><br>
                            Github (pour contribuer à ce projet): <a href="https://github.com/ArielaFitia" target="_blank" class="text-secondary">ArielaFitia</a>
                            </p>
                            <p>
                                © Copyright by <span class="text-primary fw-bold">@Ariela Fitia</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>