<?php 

class Offres extends AbstractController
{ 
    public function index()
    /* 
    *   Par défaut, fonction getAll
    */
    { 
        $this->render('offres/index.php'); 
    }

    public function show()
    /* 
    *   Méthode show, prend en action l'article à afficher 
    */ 
    { 
        // silence is golden...
    }

    public function getOffre($id)
    { 
        return $this->render('offres/show/' . $id); // à voir pour être sûr pour la syntaxe
    }
}