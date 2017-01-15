<?php

namespace App\Entity;
use Core\Entity\Entity;

class RecetteEntity extends Entity{

    public function getUrl() {
        return 'index.php?p=recette.show&id=' . $this->id;
    }

}
