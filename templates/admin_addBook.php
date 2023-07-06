<?php $title = 'Admin - Ajouter un livre'; ?>

<?php ob_start(); ?>

<?php if ($confirmationMessage !== '') { ?>
    <div class="my-5 alert alert-success alert-dismissible fade show" role="alert">
        <?= $confirmationMessage ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<section class="my-5">
    <div class="container">
        <div class="row justify-content-evenly">
            <h2 class="pb-3 text-center">Ajout de livre</h2>
            <div class="col-12">
                <form method="POST" action="index.php?action=admin_addBook" enctype="multipart/form-data">
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
                        <input type="file" class="form-control" id="formGroupExampleInput3" name="cover_image">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>