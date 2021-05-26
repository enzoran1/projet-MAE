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
   ob_start();

   if($_GET['action'] == "decouverte")
   { 
      require BASE_DIR. 'Views/decouvrezView.php';
   }
   if($_GET['action'] == "association")
   {
      require BASE_DIR. 'Views/associationView.php';
   }
   if($_GET['action'] == "reseau")
   {
      require BASE_DIR. 'Views/reseauView.php';
   }
   if($_GET['action'] == "inscription")
   {
      require BASE_DIR. 'Views/inscriptionView.php';
   }
}

require '../Views/inc_dir/footer.php';

// faire un autoload 