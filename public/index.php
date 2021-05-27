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
   if($_GET['action'] == "deconnexion")
   { 
      session_destroy();
   }
}

require '../Views/inc_dir/footer.php';

// faire un autoload 