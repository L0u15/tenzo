<?php

namespace App\Table;

use Core\Table\Table;

class BesoinTable extends Table {

    protected $table;

    /**
     * Récupère des besoins en liant la recette associée
     * @param $id int
     * @return \App\Entity\BesoinEntity
     */
    public function findWithRecipe($id) {
        return $this->query("
            SELECT besoins.id, besoins.produit_id, besoins.recette_id, besoins.quantite, unites.nom as unite
            FROM besoins
            LEFT JOIN produits ON produit_id = produits.id
            LEFT JOIN unites ON unite_id = unites.id
            WHERE besoins.recette_id = ?", [$id], false);
    }

    public function all() {
        return $this->query("
                SELECT besoins.id, besoins.produit_id, recettes.nom as recette, utilisateurs.login as auteur, produits.nom as produit, besoins.quantite, unites.nom as unite
                FROM besoins
                LEFT JOIN recettes ON recette_id = recettes.id
                LEFT JOIN utilisateurs ON utilisateur_id = utilisateurs.id
                LEFT JOIN produits ON produit_id = produits.id
                LEFT JOIN unites ON unite_id = unites.id");
    }

    public function find($id) {
        return $this->query("
                SELECT besoins.id, besoins.produit_id, recette_id, recettes.nom as recette, utilisateurs.login as auteur, produits.nom as produit, besoins.quantite, unites.nom as unite
                FROM besoins
                LEFT JOIN recettes ON recette_id = recettes.id
                LEFT JOIN utilisateurs ON utilisateur_id = utilisateurs.id
                LEFT JOIN produits ON produit_id = produits.id
                LEFT JOIN unites ON unite_id = unites.id
                WHERE besoins.id = ?", [$id], true);
    }
    public function deleteFromRecipe($id) {
        return $this->query("DELETE FROM besoins WHERE recette_id = ?", [$id], true);
    }
}
