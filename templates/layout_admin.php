<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>
    <nav>
        <a href="index.php?action=admin_dashboard">Accueil</a>
        <a href="index.php?action=admin_books">Livres</a>
        <a href="index.php?action=admin_addBook">Ajouter livre</a>
        <a href="index.php?action=admin_members">Membres</a>
        <a href="index.php?action=admin_loans">Emprunts</a>
        <a href="index.php?action=admin_suggestions">Suggestions</a>
        <a href="index.php?action=logout">Déconnexion</a>
    </nav>

    <?= $content ?>

</body>

</html>