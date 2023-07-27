<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <header>
        <nav class="navbar">
            <a class="ms-5 navbar-brand" href="#"><img src="public\images\inkwellly.png" alt="logo"></a>
        </nav>
    </header>
    <main>
        <h2 class="py-3 text-center">Bienvenue sur inkwellly</h2>
        <section class="my-5">
            <div class="container">
                <div class="row justify-content-evenly">
                    <div class="col-12 col-md-6 py-3 py-md-0">
                        <form method="POST" action="index.php?action=login">
                            <div class="form-floating mb-3">
                                <input name="id" type="text" class="form-control" id="floatingInput" placeholder="entrez votre identifiant" required>
                                <label for="floatingInput">Identifiant</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="mot de passe" required>
                                <label for="floatingPassword">Mot de passe</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="status" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                                    <option selected>Ouvrir pour selectionner votre statut</option>
                                    <option value="membre">Membre</option>
                                    <option value="admin">Bibliothécaire</option>
                                </select>
                                <label for="floatingSelect">Statut</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Connexion</button>
                        </form>
                    </div>
                    <div class="col-12 col-md-4 py-3 py-md-0 text-center">
                        <img src="public\images\authentification.svg" alt="login" width="70%">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>