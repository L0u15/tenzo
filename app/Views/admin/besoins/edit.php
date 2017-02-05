<h1>Editer un besoin</h1>
<?php var_dump($form);?>
<?php var_dump($produits);?>
<form method="post">
    <?= $form->select('recette_id', 'Recette', $recettes); ?>
    <?= $form->select('produit_id', 'Produit', $produits); ?>
    <?= $form->input('quantite','Quantité');?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>