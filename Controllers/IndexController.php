<?php 

require 'Controller.php';


Class IndexController
{

    public static function index()
    { 
        {
            require 'assets/inc_dir/header.php';
            require 'Views/indexView.php';
            require 'assets/inc_dir/footer.php';
        }
    }

}

?>