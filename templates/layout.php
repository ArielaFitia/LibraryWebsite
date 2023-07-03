<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>
    <nav>
        <a href="index.php">Accueil</a>
        <button>Comment s'inscrire ?!</button>
        <a href="index.php?action=login" target="_blank">Se connecter</a>
        <a href="index.php?action=homepage_search">rechercher</a><br>
    </nav>

    <?= $content ?>

</body>

</html>