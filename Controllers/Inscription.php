<?php 


Class Inscription
{ 
    public static function index()
    { 
        require BASE_DIR . 'Views/inscriptionView.php';
    }
}

if(isset($_POST['submit'])) 
{ 
    require BASE_DIR. 'Models/database.php'; 
    require BASE_DIR. 'Models/addUser.php';   
}