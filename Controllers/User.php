<?php 

Class User 
{  
    public function addUser()
    {
        if(isset($_POST['submit']))
        {
            require BASE_DIR. 'Models/dbConnect.php';
            require BASE_DIR. 'Models/addUser.php';
        }
        else
        { 
            echo 'Erreur';
        }
    }
}   