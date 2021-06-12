<?php class InscriptionController extends AbstractController
{ 
    public function index()
    { 
        $this->render('inscription/index.php');
    }

    public function addacount() 
    { 
        $compteManager = new CompteManager();
        $compteManager->testInscription();
        echo 'ok2';
    }
}