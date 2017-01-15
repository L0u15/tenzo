<?php

namespace App\Entity;
use Core\Entity\Entity;

class UtilisateurEntity extends Entity{

    public function getUrl() {
        /**
         * TODO : archi URL
         */
        return 'index.php?p=admin.utilisateur&id=' . $this->id;
    }


}
