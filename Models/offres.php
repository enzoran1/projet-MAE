<?php 

require BASE_DIR . '/Models/database.php';

$query = $bdd->prepare('SELECT * FROM offre');
$query->execute();
$query->fetchAll();