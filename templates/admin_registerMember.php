<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription-membre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav><a class="ms-5 mt-2 btn btn-outline-primary" href="index.php?action=admin_dashboard" role="button">Retour</a>
        </nav>
    </header>
    <main>
        <h2 class="py-3 text-center">Inscrire un membre chez inkwellly</h2>
        <section class="my-5">
            <div class="container">
                <div class="row justify-content-evenly">
                    <div class=" col-6">
                        <form method="POST" action="index.php?action=registerMember">
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
                            <div class="form-floating mb-3">
                                <input name="payment_date" type="date" class="form-control" id="floatingDate" required>
                                <label for="floatingDate">Date de paiement</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="expiration_date" type="date" class="form-control" id="floatingDate1" required>
                                <label for="floatingDate1">Date d'expiration</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="payment_option" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                                    <option selected>Ouvrir pour selectionner une option</option>
                                    <option value="Paiement en une fois">Paiement en une fois</option>
                                    <option value="Paiement en deux tranches">Paiement en deux tranches</option>
                                </select>
                                <label for="floatingSelect">Option de paiement</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Inscrire</button>
                        </form>
                    </div>
                    <div class="col-6">
                        <img src="public\images\sign_up.svg" alt="sign_up" width="100%">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>