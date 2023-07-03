<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>
    <nav>
        <a href="index.php?action=member_dashboard">Accueil</a>
        <a href="index.php?action=member_search">Rechercher</a><br>
        <button>Profil</button>
        <ul>
            <li>Bienvenue, <?= $userName ?> (ID: <?= $userId ?>)</li>
        </ul>
        <a href="index.php?action=logout">Déconnexion</a>
    </nav>

    <?= $content ?>

</body>

</html>