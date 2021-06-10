<?php

class HomeController extends AbstractController
{
    public function index()
    {
        //Traitements
        $this->render('home/index.php');
    }
}


