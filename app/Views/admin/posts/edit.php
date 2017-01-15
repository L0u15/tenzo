<form method="post">
    <?= $form->input('titre', 'Nom du produit'); ?>
    <?= $form->select('unite_id', 'Unité', $unites); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>