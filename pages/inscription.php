<?php

include '../inc/inc_top.php';
include '../pages/cobdd.php';

$requete = $bdd->prepare('SELECT * FROM situations');
$requete->execute();
$situations = $requete->fetchAll(PDO::FETCH_ASSOC);


if (!empty($_POST['submit'])) 
{ // On vérifie que le submit est lancé et que tous les champs sont remlis 

    if (!empty($_POST['email']) 
    && !empty($_POST['email']) 
    && !empty($_POST['password']) 
    && !empty($_POST['tel'])) {

        echo 'ok <br>';

        // créer une requête permettant de comparer tous les mails avec celui entré (rowCount>0) 

        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $tel = $_POST['tel'];

        $requestEmailExist = $bdd->prepare("SELECT * FROM user WHERE email ='".$email."'");
        $requestEmailExist->execute();;
        $count = $requestEmailExist->rowCount(); // renvoi 0 si l'user n'existe pas... 1 s'il existe
        
        echo 'Vérification de l\'email... <br>';

        if($count > 0) 
        { 
            echo 'L\'email que vous avez utilisé existe déjà.';
            die;
        } 
        else
        { 
            // dans le cas ou count est égal à 0
            $requete = $bdd->prepare('INSERT INTO user(email, mdp, telephone) VALUES(?,?,?)');
            $requete->execute(array($email, $password, $tel));
            echo 'Votre compte a été créee';

            if (isset($_POST['situation'])) 
            {
                header('Location: ./inseleves.php');
            }
        }

    }   
}




?>


<form action="" method="POST">

    <div>
        <label for="email">
            <input type="email" name="email" id="email" placeholder="email">
        </label>
    </div>
    <div>
        <label for="password">
            <input type="password" name="password" id="password" placeholder="password">
        </label>
    </div>
    <div>
        <label for="tel">
            <input type="text" name="tel" id="tel" placeholder="tel">
        </label>
    </div>

    <div>

        <label for="situation"></label>

        <select name="situation" id="situation">
            <option value="">--situation--</option>
            <?php foreach ($situations as $situation) { ?>
                <option value="<?= $situation['id_situation'] ?>"><?= $situation['label_situation'] ?></option>
            <?php } ?>
        </select>
    </div>


    <button type="submit" name="submit" value='submit'>Envoyer</button>

    <?php var_dump($_POST); ?>


</form>