<?php 

require 'Controller.php';


Class DecouvrezController
{

    public static function index()
    { 
        if(isset($_GET['action']) == "decouverte")
        {
            require 'assets/inc_dir/header.php';
            require 'Views/decouver';
            require 'assets/inc_dir/footer.php';
        }
    }

}

?>