<?php


try {
    $bdd = new PDO('mysql:host=141.94.17.99:3306;dbname=projetifa;charset=utf8mb4', 'root', 'azerty');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die('erreur :' . $e->getMessage());
}

?>