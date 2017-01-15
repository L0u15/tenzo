<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

class RecettesController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Recette');
        //$this->loadModel('Utilisateur');
    }

    public function index() {
        $recettes = $this->Recette->all();
        $this->render('admin.recettes.index', compact('recettes'));
    }

    public function add() {
        if (!empty($_POST)) {
            $result = $this->Recette->create([
                'nom' => $_POST['nom'],
                'utilisateur_id' => $_POST['utilisateur_id']
            ]);
            var_dump($result);
            return $this->index();
        }
        $this->loadModel('Unite');
        $unites = $this->Unite->extract('id', 'nom');
        $this->loadModel('Utilisateur');
        $utilisateurs = $this->Utilisateur->extract('id', 'login');
        $form = new BootstrapForm($_POST);
        $this->render('admin.recettes.edit', compact('unites', 'form','utilisateurs'));
    }

    public function edit() {
        if (!empty($_POST)) {
            $result = $this->Recette->update($_GET['id'], [
                'nom' => $_POST['nom'],
                'unite_id' => $_POST['unite_id']
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $produit = $this->Recette->find($_GET['id']);
        $unites = $this->Unite->extract('id', 'nom');
        $form = new BootstrapForm($produit);
        $this->render('admin.produits.edit', compact('unites', 'form'));
    }

    public function delete() {
        if (!empty($_POST)) {
            $result = $this->Recette->delete($_POST['id']);
            return $this->index();
        }
    }

}
