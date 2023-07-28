<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - bibliothécaire</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <header>
        <nav><a class="ms-5 mt-2 btn btn-outline-primary" href="index.php?action=admin_dashboard" role="button">Retour</a>
        </nav>
    </header>
    <main>
        <h2 class="py-3 text-center">Inscrire un(e) bibliothécaire chez inkwellly</h2>
        <section class="my-5">
            <div class="container">
                <div class="row justify-content-evenly">
                    <div class="col-12 col-md-6 py-3 py-md-0">
                        <form method="POST" action="index.php?action=registerAdmin">
                            <div class="form-floating mb-3">
                                <input name="fullname" type="text" class="form-control" id="floatingInput1" placeholder="nom complet" required>
                                <label for="floatingInput1">Nom complet</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="mot de passe" required>
                                <label for="floatingPassword">Mot de passe</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Inscrire</button>
                        </form>
                    </div>
                    <div class="col-12 col-md-6 py-3 py-md-0">
                        <img src="public\images\sign_up.svg" alt="sign_up" width="100%">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>