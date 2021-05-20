<?php 
include '../inc/inc_top.php';

// débug ici
session_destroy();


sleep(2);
$url = 'http://index';
get_headers($url);
exit;

