<?php
define('BASE_DIR', '../');
require BASE_DIR . 'app/Autoloader.php';


Autoloader::register();


require '../Views/inc_dir/header.php';

// Logique pour appeler la bonne vue
if(!isset($_GET['action']))
{
   IndexController::index();
} 
else 
{ 
   if($_GET['action'] = "decouverte")
   { 
      require BASE_DIR. 'Views/decouvrezView.php';
   }
}

require '../Views/inc_dir/footer.php';

// faire un autoload 