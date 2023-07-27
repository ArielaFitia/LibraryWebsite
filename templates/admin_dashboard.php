<?php $title = 'Admin_dashboard'; ?>

<?php ob_start(); ?>

<main>
    <h2 class="py-3 text-center">Tableau de bord des bibliothécaires</h2>
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col-5">
                    <img src="public\images\decision.svg" alt="decision" width="100%">
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container text-center">
            <div class="row justify-content-evenly">
                <div class="col-12 col-md-3 py-2">
                    <a class="btn btn-secondary" href="index.php?action=registerMember" role="button">Inscrire un nouveau membre</a>
                </div>
                <div class="col-12 col-md-3 py-2">
                    <a class="btn btn-secondary" href="index.php?action=registerAdmin" role="button">Inscrire un(e) bibliothécaire </a>
                </div>
                <div class="col-12 col-md-3 py-2">
                    <a class="btn btn-secondary" href="index.php?action=admin_searchMember" role="button">Rechercher un membre</a>
                </div>
                <div class="col-12 col-md-3 py-2">
                    <a class="btn btn-secondary" href="index.php?action=admin_searchBook" role="button">Rechercher un livre</a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>