<?php
session_start(); 

// Définitions de constantes
define('BASE_DIR','../');

// Appel de l'autoloader
require BASE_DIR . 'app/Autoloader.php';

// On lance notre Routeur
$router = new Router($_SERVER['REQUEST_URI']);
$router->execute();

?>

<script src="/js/script.js"></script>