<?php 

require BASE_DIR. 'Models/Database.php';


if(isset($_POST['submit']))
{
    if(isset($_POST['email']) 
    && isset($_POST['password']) 
    && isset($_POST['tel'])) 
    { 
        $query = $bdd->prepare('INSERT INTO user (email, password, tel) VALUES (?, ?, ?)');
        $query->execute(array($_POST['email'], $_POST['password'], $_POST['tel']));
        $query->fetch();
        $query->closeCursor();
    }
}