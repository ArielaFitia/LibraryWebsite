<?php $title = 'Bibliothecaire - Suggestions'; ?>

<?php ob_start(); ?>

<section class="my-5">
    <h2 class="pb-3 text-center">Liste de suggestions</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Livre concerné</th>
                <th scope="col">Auteur de la suggestion</th>
                <th scope="col">Message</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suggestions as $suggestion) { ?>
                <tr>
                    <th scope="row"><?= $suggestion['title'] ?></th>
                    <td><?= $suggestion['fullname'] ?></td>
                    <td><?= $suggestion['message'] ?></td>
                    <td>
                        <form method="POST" action="index.php?action=delete_suggestion&amp;suggestion_id=<?= $suggestion['id']; ?>" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette suggestion ?')">
                            <button type="submit" class="btn btn-danger" name="delete_suggestion">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('layout_admin.php'); ?>