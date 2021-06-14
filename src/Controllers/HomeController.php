<?php

class HomeController extends AbstractController
{
    public function index()
    {
        if(empty($_SESSION))
        {
            $this->render('home/index.php');
        }
        else
        {
            $this->render('home/indexuser.php'); // à modifier, créer une page d'accueil
        }
    }
}


