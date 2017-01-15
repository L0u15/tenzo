<?php

namespace App\Controller;

use Core\Controller\Controller;

class RecettesController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Recette');
        $this->loadModel('Besoin');
        $this->loadModel('Utilisateur');
    }

    public function index() {
        $recettes = $this->Recette->all();
        $auteurs = $this->Utilisateur->all();
        $this->render('posts.index', compact('recettes', 'auteurs'));
    }

    public function category() {
        $categorie = $this->Category->find($_GET['id']);
        if ($categorie === false) {
            $this->notFound();
        }
        $articles = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('articles', 'categories', 'categorie'));
    }

    public function show() {
        $article = $this->Post->findWithCategory($_GET['id']);
                $this->render('posts.show', compact('article'));

    }

}
