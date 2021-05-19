<?php 
include '../inc/inc_top.php';

// débug ici
session_destroy();

header('Location: /index');
exit;


// directement sur l'index. Mettre if(isset($_SESSIOOn)) -> Destroy 