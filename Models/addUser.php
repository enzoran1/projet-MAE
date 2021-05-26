<?php 

require BASE_DIR. 'Models/Database.php';

function setNewUser($bdd)
{
    if(isset($_POST['submit']))
    {
        $bdd->prepare('INSERT INTO user (email, password, tel) VALUES (?, ?, ?)');
        $bdd->execute();
        $bdd->fetch(array($_POST['email'], $_POST['password'], $_POST['tel']));
    }
}