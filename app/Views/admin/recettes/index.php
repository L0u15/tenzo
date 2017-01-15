<h1>Administrer les Recettes</h1>
<?php var_dump($recettes);?>
<p>
    <a href="?p=admin.recettes.add" class="btn btn-success">Ajouter</a>
</p>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nom</td>
            <td>Auteur</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recettes as $recette): ?>
            <tr>
                <td><?= $recette->id; ?></td>
                <td><?= $recette->nom; ?></td>
                <td><?= $recette->auteur; ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=admin.recettes.edit&id=<?= $recette->id; ?>">Editer</a>
                    <form action="?p=admin.recettes.delete" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $recette->id; ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;
        ?>
    </tbody>
</table>