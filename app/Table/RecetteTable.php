<?php

namespace App\Table;

use Core\Table\Table;

class RecetteTable extends Table {

    protected $table;
    
    /**
     * Récupère les dernières recettes
     * @return array
     */
    public function last(){
        return $this->query("
                SELECT recettes.id, recettes.nom, utilisateurs.nom as auteur
                FROM recettes
                LEFT JOIN utilisateurs ON utilisateur_id = utilisateurs.id");
    }
    
    public function findWithAutor($id) {
        return $this->query("
            SELECT recettes.id, recettes.nom, utilisateurs.nom as auteur
            FROM recettes 
            LEFT JOIN utilisateurs ON utilisateur_id = utilisateurs.id
            WHERE utilisateurs.id = ?", [$id], false);
    }

}
