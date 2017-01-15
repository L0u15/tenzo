<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

class UnitesController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Unite');
    }

    public function index() {
        $items = $this->Unite->all();
        $this->render('admin.unites.index', compact('items'));
    }

    public function add() {
        if (!empty($_POST)) {
            $result = $this->Unite->create([
                'nom' => $_POST['nom']
            ]);
            return $this->index();
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.unites.edit', compact('form'));
    }

    public function edit() {
        if (!empty($_POST)) {
            $result = $this->Unite->update($_GET['id'], [
                'nom' => $_POST['nom'],
            ]);
            return $this->index();
        }
        $unite = $this->Unite->find($_GET['id']);
        $form = new BootstrapForm($unite);
        $this->render('admin.unites.edit', compact('form'));
    }

    public function delete() {
        if (!empty($_POST)) {
            $result = $this->Unite->delete($_POST['id']);
            return $this->index();
        }
    }

}
