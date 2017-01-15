<h1><?= $recette->titre; ?></h1>
<p><em><?= $recette->auteur ?></em></p>
<table class="table">
    <thead>
        <tr>
            <td>Produit</td>
            <td>Quantité</td>
            <td>Unité</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recette->besoins as $besoin): ?>
        <td><?= $besoin->produit; ?></td>
        <td><?= $besoin->quantite; ?></td>
        <td><?= $besoin->unite; ?></td>
    <?php endforeach; ?>
</tbody>
</table>