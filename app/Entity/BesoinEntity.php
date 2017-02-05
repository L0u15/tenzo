<?php

namespace App\Entity;
use Core\Entity\Entity;

class BesoinEntity extends Entity{

    public function getUrl() {
        return 'index.php?p=besoins.show&id=' . $this->id;
    }

}
