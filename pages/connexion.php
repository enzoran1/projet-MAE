<?php
ob_start();
require '../inc/inc_top.php';




if (isset($_POST['submit'])) {

    if (
        !empty($_POST['email'])
        && !empty($_POST['mdp'])
    ) {
        require_once '../pages/cobdd.php';

        $yourEmail          =    $_POST['email'];
        $yourPassword       =    $_POST['mdp'];

        // 1ERE REQUETE : selectionne l'email
        $queryUser = $bdd->prepare("SELECT * FROM user WHERE email='" . $yourEmail . "'");
        $queryUser->execute();
        $result = $queryUser->fetch();

        // 2EME REQUETE : selectionne le mdp SI il reconnait le mail
        if (!password_verify($yourPassword, $result['mdp'])) {
            die('Mot de passe invalide');
        } else {
            ob_clean();
            header('Location: dashboard.php');
        }
    }
}







// $queryPassword = $bdd->prepare("SELECT * FROM user WHERE mdp ='".$yourPassword."'"); // ON EN EST LA !!! 
// $queryPassword->execute();

// $resultPassword = $queryPassword->fetchAll();
// var_dump($resultPassword);

// $count2 = $queryPassword->rowCount();
// var_dump($count2);
// if($count2 > 0) 
// {   
//     $_SESSION['mail'] = $_POST['email'];
//     $_SESSION['mdp'] = $_POST['mdp'];
//     echo 'felicitations';
//     // header('Location: dashboard.php');
// }
//         }else
//         {
//             echo '<h2> Mot de passe incorrect </h2>';
//             session_destroy();
//         }
//     }
//     else
//     { 
//         echo 'Adresse e-mail invalide';
//     } 
// else
// { 
//     echo '<h2> Veuillez renseigner tous les champs</h2>';
//     session_destroy();
// }

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
            <input type="password" name="mdp" id="mdp" placeholder="mdp">
        </label>
    </div>

    <button type="submit" name="submit" value='submit'>Envoyer</button>

</form>

<h2> <a href="../index.php"> Retour au menu </a> </h2>

<?php {
    // $_POST['situations'] == 1        ?      $path = "inseleves"               :       $path = "insentreprise";
}

?>