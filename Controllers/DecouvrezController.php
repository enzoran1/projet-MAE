<?php 

namespace Controllers;


Class DecouvrezController
{
    public static function index()
    { 
        require 'assets/inc_dir/header.php';
        require 'Views/decouvrezView.php';
        require 'assets/inc_dir/footer.php';        
    }
}

?>