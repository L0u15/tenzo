<h1>Modification de l'utilisateur</h1>
<?php var_dump($form);?>
<form method="post">
    <?= $form->input('login', 'login'); ?>
    <?= $form->password('password', 'Nouveau mot de passe'); ?>
    <button class="btn btn-primary">Sauvegarder</button>
    <button class="btn btn-danger">Annuler</button>
</form>