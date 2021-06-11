<?php 

class InscriptionController extends abstractController 
{ 
    public function index() 
    { 
        $this->render('inscription/index.php');
    }
}