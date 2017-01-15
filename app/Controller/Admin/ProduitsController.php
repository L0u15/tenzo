<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

class ProduitsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Produit');
        $this->loadModel('Unite');
    }

    public function index() {
        $produits = $this->Produit->all();
        $this->render('admin.produits.index', compact('produits'));
    }

    public function add() {
        if (!empty($_POST)) {
            $result = $this->Produit->create([
                'nom' => $_POST['nom'],
                'unite_id' => $_POST['unite_id']
            ]);
            return $this->index();
        }
        $unites = $this->Unite->extract('id', 'nom');
        $form = new BootstrapForm($_POST);
        $this->render('admin.produits.edit', compact('unites', 'form'));
    }

    public function edit() {
        if (!empty($_POST)) {
            $result = $this->Produit->update($_GET['id'], [
                'nom' => $_POST['nom'],
                'unite_id' => $_POST['unite_id']
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $produit = $this->Produit->find($_GET['id']);
        $unites = $this->Category->extract('id', 'nom');
        $form = new BootstrapForm($produit);
        $this->render('admin.produits.edit', compact('unites', 'form'));
    }

    public function delete() {
        if (!empty($_POST)) {
            $result = $this->Produit->delete($_POST['id']);
            return $this->index();
        }
    }

}
