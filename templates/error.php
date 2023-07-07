<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error reporting</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>

    <section class="my-5">
        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col-6 align-self-center">
                    <h1 class="py-3 text-center">
                        Ouups!
                    </h1>
                    <h2 class="text-warning"><?= $errorMessage ?></h2>
                </div>
                <div class="col-6">
                    <img src="public\images\oops.svg" alt="erreur" width="100%">
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>