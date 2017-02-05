<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

class BesoinsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Besoin');
    }

    public function index() {
        $besoins = $this->Besoin->all();
        $this->render('admin.besoins.index', compact('besoins'));
    }

    public function add() {
        if (!empty($_POST)) {
            $result = $this->Besoin->create([
                'produit_id' => $_POST['produit_id'],
                'recette_id' => $_POST['recette_id'],
                'quantite' => $_POST['quantite']
            ]);
            var_dump($result);
            return $this->index();
        }
        $this->loadModel('Produit');
        $produits = $this->Produit->extract('id', 'nom');

        $this->loadModel('Recette');
        $recettes = $this->Recette->extract('id', 'nom');

        $form = new BootstrapForm($_POST);
        $this->render('admin.besoins.edit', compact('produits', 'form', 'recettes'));
    }

    public function edit() {
        if (!empty($_POST)) {
            $result = $this->Besoin->update($_GET['id'], [
                'produit_id' => $_POST['produit_id'],
                'recette_id' => $_POST['recette_id'],
                'quantite' => $_POST['quantite']
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $besoin = $this->Besoin->find($_GET['id']);
        $form = new BootstrapForm($besoin);

        $this->loadModel('Produit');
        $produits = $this->Produit->extract('id', 'nom');

        $this->loadModel('Recette');
        $recettes = $this->Recette->extract('id', 'nom');

        //Envoi des variables
        $this->render('admin.besoins.edit', compact(
                        'produits', 'form', 'recettes'
        ));
    }

    public function delete() {
        if (!empty($_POST)) {
            $result = $this->Besoin->delete($_POST['id']);
            return $this->index();
        }
    }

}
