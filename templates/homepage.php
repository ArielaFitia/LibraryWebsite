<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>
    <h1>Les livres</h1><br>
    <?php foreach ($books as $book) { ?>
        <h3><?= $book['title']; ?></h3>
        <h2><?= $book['author']; ?></h2>
        <p><?= $book['synopsis']; ?></p>
        <br>
    <?php } ?>
</body>

</html>