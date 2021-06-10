<?php 

class ReseauController extends AbstractController 
{ 
    public function index() 
    { 
        //Traitements
        $this->render('reseau/index.php');
    }
}