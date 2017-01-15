<?php if ($errors): ?>
    <div class="alert alert-danger">
        Identifiants incorrects
    </div>
<?php endif; ?>

<form method="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->password('password', 'Mot de passe'); ?>
    <?= $form->submit(); ?>
</form>