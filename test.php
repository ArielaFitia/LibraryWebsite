<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
</head>


<body>

  <?php foreach ($books as $book) { ?>
    <img src="cover_images/<?= $book->cover_image ?>" alt="Couverture du livre">
    <h3><?= $book->title ?></h3>
    <h2><?= $book->author ?></h2>
    <p><?= $book->synopsis ?></p>
    <br>

    <form method="POST" action="index.php?action=update_book&id=<?= $book->id ?>">
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Titre</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name="title" required>
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Auteur</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="author" required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Synopsis</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="synopsis" required></textarea>
      </div>
      <div class="mb-3">
        <label for="availability" class="form-label">Disponibilité</label>
        <select name="availability" class="form-select">
          <option value="Disponible">Disponible</option>
          <option value="Emprunté">Emprunté</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput3" class="form-label">Image de couverture</label>
        <input type="file" class="form-control" id="formGroupExampleInput3" name="cover_image" required>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
    </form>
    <br>
  <?php } ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>