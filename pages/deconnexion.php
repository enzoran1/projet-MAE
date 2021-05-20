<?php 
include '../inc/inc_top.php';


session_destroy();
echo 'Vous êtes déconnecté';
sleep(1);
ob_clean();
header('Location: ../pages/index.php');


