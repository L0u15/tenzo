<div class="row">
    <div class="col-sm-8">
        <ul>
            <?php foreach ($recettes as $recette): ?>
                <h2><a href="<?= $recette->url ?>"><?= $recette->titre; ?></a></h2>
                <p><em><?= $recette->auteur; ?></em></p>
            <?php endforeach; ?>
        </ul>

    </div>
    <div class="col-sm-4">
        <ul>
            <?php foreach ($auteurs as $auteur): ?>
                <li><a href="<?= $auteur->url; ?>"><?= $auteur->nom; ?></a></li>
            <?php endforeach; ?>
        </ul>

    </div>
</div>