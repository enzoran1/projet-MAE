<?php
define('BASE_DIR', '../');
require BASE_DIR . 'app/Autoloader.php';


Autoloader::register();


require '../Views/inc_dir/header.php';

// Logique pour appeler la bonne vue
if(!isset($_GET['action']))
{
   Home::index();
} 
else 
{ 
   if($_GET['action'] == "decouvrez")
   { 
      Decouvrez::index();
   }
   if($_GET['action'] == "association")
   {
      Association::index();
   }
   if($_GET['action'] == "reseau")
   {
      Reseau::index();
   }
   if($_GET['action'] == "inscription")
   {
      Inscription::index();
   }
   if($_GET['action'] == 'compte')
   { 
      Compte::index();
   }

   if($_GET['action'] == "offres")
   { 
   Offres::index();
   }

   if($_GET['action'] == "deconnexion")
   { 
      session_destroy(); ?>
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
            </script>
      </script> <?php
   }
}




require '../Views/inc_dir/footer.php';

// faire un autoload 
?>