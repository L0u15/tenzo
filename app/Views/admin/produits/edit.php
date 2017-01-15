<?php var_dump($form);?>
<form method="post">
    <?= $form->input('nom', 'Nom du produit'); ?>
    <?= $form->select('unite_id', 'Unité', $unites); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>