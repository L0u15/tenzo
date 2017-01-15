<h1>Administrer les produits</h1>
<p>
    <a href="?p=admin.produits.add" class="btn btn-success">Ajouter</a>
</p>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nom</td>
            <td>Unité</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produits as $produit): ?>
            <tr>
                <td><?= $produit->id; ?></td>
                <td><?= $produit->nom; ?></td>
                <td><?= $produit->unite; ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=admin.produits.edit&id=<?= $produit->id; ?>">Editer</a>
                    <form action="?p=admin.produits.delete" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $produit->id; ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;
        ?>
    </tbody>
</table>