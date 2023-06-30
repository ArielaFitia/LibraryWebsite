<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>
    <button>Comment s'inscrire ?!</button>
    <a href="templates/login.php" target="_blank">Se connecter</a>
    <h1>Les livres recents</h1><br>
    <?php foreach ($books as $book) { ?>
        <h3><?= $book['title'] ?></h3>
        <h2><?= $book['author'] ?></h2>
        <p><?= $book['synopsis'] ?></p>
        <br>
    <?php } ?>
    <a href="homepage_books.php">Voir plus</a>
</body>

</html>