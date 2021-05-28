<?php 

class Compte 
{  

    public static function index()
    { 
        if(!isset($_SESSION['email']) && !isset($_SESSION['password']))
        {
            require BASE_DIR . 'Views/connexionView.php';
        }
        else
        {
            require BASE_DIR . 'Views/dashboardView.php'; ?>
            <script>       
                (() => {
                    if (window.localStorage) {  
                        // If there is no item as 'reload'
                        // in localstorage then create one &
                        // reload the page
                        if (!localStorage.getItem('reload')) {
                            localStorage['reload'] = true;
                            window.location.reload();
                        } else {
                        
                            // If there exists a 'reload' item
                            // then clear the 'reload' item in
                            // local storage
                            localStorage.removeItem('reload');
                        }
                    }
                })();  
            </script> <?php
        }
    }
}

if(isset($_POST['submit']))
{
    require BASE_DIR. 'Models/database.php'; 
    require BASE_DIR. 'Models/connexion.php';
}


?>