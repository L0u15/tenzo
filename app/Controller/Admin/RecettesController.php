<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

class RecettesController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Recette');
        $this->loadModel("Besoin");
        $this->loadModel("Utilisateur");
        $this->loadModel("Unite");
        $this->loadModel("Produit");
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
            return $this->index();
        }
        $this->editRender();
//        $unites = $this->Unite->extract('id', 'nom');
//        $utilisateurs = $this->Utilisateur->extract('id', 'login');
//        $form = new BootstrapForm($_POST);
//        $this->render('admin.recettes.edit', compact('unites', 'form', 'utilisateurs'));
    }

    public function edit() {
        if (!empty($_POST)) {
            $this->update();
        }
        $this->editRender();
    }

    public function delete() {
        if (!empty($_POST)) {
            $result = $this->Recette->delete($_POST['id']);
            if ($result) {
                $result = $this->Besoin->deleteFromRecipe($_POST['id']);
            }
            return $this->index();
        }
    }

    public function deleteBesoin() {

        if (!empty($_POST)) {
            $result = $this->Besoin->delete($_POST['id']);
        }
        $this->editRender();
    }

    public function editBesoin() {
        if (!empty($_POST)) {
            $result = $this->Besoin->update($_GET['id'], [
                'produit_id' => $_POST['produit_id'],
                'recette_id' => $_POST['recette_id'],
                'quantite' => $_POST['quantite']
            ]);
            if ($result) {
                return $this->editRender();
            }
        }
        $this->editRender();
    }

    private function update() {
        return $this->Recette->update($_GET['id'], [
                    'nom' => $_POST['nom'],
                    'utilisateur_id' => $_POST['utilisateur_id']
        ]);
    }

    private function editRender() {
        //Unités
        $unites = $this->Unite->extract('id', 'nom');

        //Utilisateurs
        $utilisateurs = $this->Utilisateur->extract('id', 'login');

        //Produits
        $produits = $this->Produit->extract('id', 'nom', 'unite_id');

        $tabOfFormBesoin = array();

        //Recette
        if (isset($_GET['id'])) {
            $recette = $this->Recette->find($_GET['id']);
            $formRecette = new BootstrapForm($recette);

            $besoins = $this->Besoin->findWithRecipe($_GET['id']);

            foreach ($besoins as $besoin) {
                array_push($tabOfFormBesoin, new BootstrapForm($besoin));
            }
            $this->render('admin.recettes.edit', compact(
                            'unites', 'formRecette', 'tabOfFormBesoin', 'utilisateurs', 'besoins', 'produits'
            ));
        } else {
            $formRecette = new BootstrapForm($_POST);
            $this->render('admin.recettes.edit', compact('unites', 'formRecette', 'utilisateurs', 'tabOfFormBesoin'));
        }
    }

}
