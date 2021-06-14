<?php class InscriptionController extends AbstractController
{ 
    public function index()
    { 
        $this->render('inscription/index.php');
    }

    public function inscription() 
    { 
        $compteManager = new CompteManager();
        $compteManager->testInscription();
    }
}