<h1>Editer une recette</h1>
<form action="?p=admin.recettes.edit&id=<?= $formRecette->data->id; ?>" method="post">
    <?= $formRecette->input('nom', 'Nom de la recette'); ?>
    <?= $formRecette->select('utilisateur_id', 'Auteur', $utilisateurs); ?>
    <button class="btn btn-success">Sauvegarder</button>
</form>
<table class="table">
    <thead>
        <tr>
            <td>Produit</td>
            <td>Quantité</td>
            <td>Unité</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tfoot>
    <td><button class="btn btn-primary">Ajouter un produit</button></td>
</tfoot>
<tbody>
    <?php foreach ($tabOfFormBesoin as $formBesoin): ?>
        <tr>
    <form action="?p=admin.recettes.editBesoin&id=<?= $formRecette->data->id; ?>" method="post" style="display:inline;">
        <td><?= $formBesoin->select('produit_id', '', $produits); ?></td>
        <td><?= $formBesoin->input("quantite", ''); ?></td>
        <td><?= $formBesoin->input("unite", '', ['type' => 'disabled']); ?></td>
        <td>
            <button type="submit" class="btn btn-success">Sauvegarder</button>
    </form>

    <form action="?p=admin.recettes.deleteBesoin&id=<?= $formRecette->data->id; ?>" method="post" style="display:inline;">
        <input type="hidden" name="id" value="<?= $formBesoin->data->id; ?>">
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
    </td>
    </tr>        
<?php endforeach; ?>

</tbody>

</table>

<form action="?p=admin.recettes.index" method="post" style="display:inline;">
    <button  class="btn btn-danger">Terminer</button>
</form>


