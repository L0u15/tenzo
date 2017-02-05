<h1>Administrer les besoins</h1>
<p>
    <a href="?p=admin.besoins.add" class="btn btn-success">Ajouter</a>
</p>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Recette</td>
            <td>Auteur</td>
            <td>Produit</td>
            <td>Quantité</td>
            <td>Unité</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($besoins as $besoin): ?>
            <tr>
                <td><?= $besoin->id; ?></td>
                <td><?= $besoin->recette; ?></td>
                <td><?= $besoin->auteur; ?></td>
                <td><?= $besoin->produit; ?></td>
                <td><?= $besoin->quantite; ?></td>
                <td><?= $besoin->unite; ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=admin.besoins.edit&id=<?= $besoin->id; ?>">Editer</a>
                    <form action="?p=admin.besoins.delete" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $besoin->id; ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;
        ?>
    </tbody>
</table>