<?php

namespace App\Entity;
use Core\Entity\Entity;

class UniteEntity extends Entity{

    public function getUrl() {
        /**
         * TODO : archi URL
         */
        return 'index.php?p=admin.unite&id=' . $this->id;
    }


}
