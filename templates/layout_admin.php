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
                <a class="navbar-brand" href="#">inkwellly</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?action=admin_dashboard">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=admin_books">Livres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=admin_addBook">Ajout de livre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=admin_members">Membres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=admin_loans">Emprunts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=admin_suggestions">Suggestions</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav mb-2 mb-lg-0 text-center me-3">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=logout"><img src="public\images\sign_out.png" alt="deconnexion"></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <?= $content ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>