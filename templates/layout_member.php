<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <header class="py-4">
        <nav class="navbar navbar-expand-md fixed-top navbar-light bg-white">
            <div class="container">
                <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><img src="public\images\more.png" alt="plus"></button>

                <a class="navbar-brand" href="#"><img src="public\images\inkwellly.png" alt="logo"></a>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <h3 class="navbar-nav mb-2 mb-lg-0 text-center text-primary">Simple mais efficace, un coin rien qu'à vous !</h3>
                </div>
                <ul class="navbar-nav mb-2 mb-lg-0 text-center me-3">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=member_search"><img src="public\images\search.svg" alt="search"></a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-custom-class="Profil" data-bs-title="Faites ~profil~ bas !" data-bs-content="<?= $userName ?> (ID: <?= $userId ?>)">
                            <img src="public\images\user.png" alt="profil">
                        </button>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0 text-center me-3">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=logout"><img src="public\images\sign_out.png" alt="deconnexion"></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="offcanvas offcanvas-start bg-primary" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Un peu plus par ici xD</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            ...
        </div>
    </div>

    <?= $content ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
</body>

</html>