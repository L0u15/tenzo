<h1>Administrer les unités</h1>

<p>
    <a href="?p=admin.unites.add" class="btn btn-success">Ajouter</a>
</p>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nom</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $unite): ?>
            <tr>
                <td><?= $unite->id; ?></td>
                <td><?= $unite->nom; ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=admin.unites.edit&id=<?= $unite->id; ?>">Editer</a>
                    <form action="?p=admin.unites.delete" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $unite->id; ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;
        ?>
    </tbody>
</table>