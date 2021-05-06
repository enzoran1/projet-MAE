<?php

include '../inc/inc_top.php';
include '../pages/cobdd.php';

$requete = $bdd->prepare('SELECT * FROM situations');
$requete->execute();
$situations = $requete->fetchAll(PDO::FETCH_ASSOC);




if (!empty($_POST['submit'])) {

    if (isset($_POST['email'], $_POST['password'], $_POST['tel']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['tel'])) {

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            die("l'adresse email est incorrecte");
        }
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_ARGON2ID);
        $tel = strip_tags($_POST['tel']);
    }

    $requete = $bdd->prepare('INSERT INTO user(mail, mdp, telephone) VALUES(?,?,?)');
    $requete->execute(array($email, $password, $tel));

    if (isset($_POST['situation']) && $_POST['situation'] == 1) {
        header('Location: inseleves.php');
    }
    
    var_dump($_POST);
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


    <button type="submit">envoyer</button>


</form>