<?php 
include '../inc/inc_top.php';


session_destroy();
echo 'Vous êtes déconnecté';
sleep(1);
ob_clean();
ob_start();
ob_end_flush();
header('Location: ../index.php');
