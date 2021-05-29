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


<?php

// ------------ INDEX amélioré à effectué

// include '../app/Autoloader.php';
// Autoloader::register();

// // On recupère le contrôleur
// $controllerName = 'Home';
// if(isset($_GET['controller']))
// {
//     $controllerName = ucfirst($_GET['controller']);
// }
// $controllerName .= 'Controller';

// // On instancie le contrôleur
// if(class_exists($controllerName))
// {
//     $controller = new $controllerName();
// }
// else
// {
//     $controller = new ErrorController();
// }

// // On identifie l'action à réaliser
// $action = 'index';
// if(isset($_GET['action']))
// {
//     $action = $_GET['action'];
// }

// // On execute l'action
// if(method_exists($controller, $action)){
//     $controller->$action();
// }else{
//     $controller->error404();
// }


