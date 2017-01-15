<?php

namespace App\Table;

use Core\Table\Table;

class ProduitTable extends Table {

    protected $table;

    /**
     * 
     */
    public function all() {
        return $this->query("
                SELECT produits.id, produits.nom, unites.nom as unite
                FROM produits
                LEFT JOIN unites ON unite_id = unites.id");
    }

}
