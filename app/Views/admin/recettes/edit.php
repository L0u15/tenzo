<?php var_dump($form);?>
<form method="post">
    <?= $form->input('nom', 'Nom de la recette'); ?>
    <?= $form->select('utilisateur_id', 'Auteur', $utilisateurs); ?>
    <?= $form->select('unite_id', 'Unité', $unites); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>