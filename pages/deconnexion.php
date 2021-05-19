<?php 
include '../inc/inc_top.php';

// débug ici
session_destroy();
echo 'Vous êtes déconnecté';
sleep(1);
ob_clean();
header('Location: ../index.php');
