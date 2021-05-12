<?php
session_start();
include '../inc/inc_top.php'; 
include './cobdd.php';


function testConnexion() 
{ 
    if(
        !empty                  ($_POST['email']) 
        && !empty               ($_POST['mdp'])
    )
    { 
        $yourEmail =            $_POST['email'];
        $yourPassword =         password_hash($_POST['mdp'], PASSWORD_DEFAULT);

        // 1ERE REQUETE : selectionne l'email
        $queryUser = $bdd->prepare("SELECT * FROM user WHERE email='".$yourEmail."'");
        $queryUser->execute();
        $count = $queryUser->rowCount();


        // 2EME REQUETE : selectionne le mdp 
        if($count > 0) 
        { 
            $queryPassword = $bdd->prepare("SELECT * FROM user WHERE mdp ='".$yourPassword."'");
            // fonction pour deccrypter le mdp.... 
            $queryPassword->execute();
            $count2 = $queryPassword->rowCount();

            if($count2 > 0) 
            {   
                $_SESSION['mail'] = $_POST['email'];
                $_SESSION['mdp'] = $_POST['mdp'];
                header('Location: ./dashboard.php'); // redirection vers dashboard
            }
            else
            {
                echo '<h2> Mdp incorrect </h2>';
                session_destroy();
            }
        } 
    }
    else
    { 
        echo '<h2> Veuillez renseigner tous les champs</h2>';
        session_destroy();
    }
}
?>


<h1>Connectez-vous pour accèder à de nombreuses fonctionnalités</h1>

<form action="" method="POST">

<div>
        <label for="email">
            <input type="email" name="email" id="email" placeholder="email">
        </label>
    </div>
    <div>
        <label for="password">
            <input type="mdp" name="mdp" id="mdp" placeholder="mdp">
        </label>
    </div>

    <button type="submit" name="submit" value='submit'>Envoyer</button>

</form>

<h2> <a href="../index.php"> Retour au menu </a> </h2>

<?php 
if(isset($_POST['submit']))
{ 
    testConnexion();


    // $_POST['situations'] == 1        ?      $path = "inseleves"               :       $path = "insentreprise";
} 

?>







