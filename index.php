<?php


include 'Controllers/IndexController.php';
include 'Controllers/DecouvrezController.php';


if(!isset($_GET['action']))
{
    IndexController::index();
} else {
    DecouvrezController::index();
}
?>