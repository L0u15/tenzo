<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

class UtilisateursController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Utilisateur');
    }

    public function index() {
        $items = $this->Utilisateur->all();
        $this->render('admin.utilisateurs.index', compact('items'));
    }

    public function add() {
        if (!empty($_POST)) {
            $result = $this->Utilisateur->create([
                'login' => $_POST['login'],
                'password' => sha1($_POST['password'])
            ]);
            return $this->index();
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.utilisateurs.edit', compact('form'));
    }

    public function edit() {
        if (!empty($_POST)) {
            //TODO vérification login unique et mdp valide
            $result = $this->Utilisateur->update($_GET['id'], [
                'login' => $_POST['login'],
                'password' => sha1($_POST['password'])
            ]);
            return $this->index();
        }
        $utilisateur = $this->Utilisateur->find($_GET['id']);
        $form = new BootstrapForm($utilisateur);
        $this->render('admin.utilisateurs.edit', compact('form'));
    }

    public function delete() {
        if (!empty($_POST)) {
            $result = $this->Utilisateur->delete($_POST['id']);
            return $this->index();
        }
    }

}
