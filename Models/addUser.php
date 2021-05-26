<?php 

require BASE_DIR. 'Models/database.php';

if(isset($_POST['submit']))
{
    if(isset($_POST['email']) 
    && isset($_POST['password']) 
    && isset($_POST['telephone'])) 
    { 
        $query = $bdd->prepare('INSERT INTO user (email, password, telephone) VALUES (?, ?, ?)');
        $query->execute(array($_POST['email'], $_POST['password'], $_POST['telephone']));
        $query->closeCursor();
        echo 'Compte réalisé avec succès ! ';
    }
}