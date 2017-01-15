<h1>Administrer les utilisateurs</h1>
<?php var_dump($items);?>
<p>
    <a href="?p=admin.utilisateurs.add" class="btn btn-success">Ajouter</a>
</p>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Login</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $utilisateur): ?>
            <tr>
                <td><?= $utilisateur->id; ?></td>
                <td><?= $utilisateur->login; ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=admin.utilisateurs.edit&id=<?= $utilisateur->id; ?>">Editer</a>
                    <form action="?p=admin.utilisateurs.delete" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $utilisateur->id; ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;
        ?>
    </tbody>
</table>