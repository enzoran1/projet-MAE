<?php 

class Offres extends AbstractController
{ 
    public function index()
    { 
        $this->render('offres/index.php');
    }

    public function show()
    { 
        // silence is golden...
    }

    public function getAll()
    {
         // Appeller le model qui récup tous les éléments 
    }

    public function getOffre($id)
    { 
        return $this->render('offres/show/' . $id); // à voir pour être sûr pour la syntaxe
    }
}