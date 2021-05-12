<?php
include '../inc/inc_top.php';
include '../pages/cobdd.php';
<<<<<<< HEAD

$requete = $bdd->prepare('SELECT * FROM situations');
$requete->execute();
$situations = $requete->fetchAll(PDO::FETCH_ASSOC);




if (!empty($_POST)) {

    if (
        isset($_POST['email'], $_POST['password'], $_POST['tel']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['tel'])
    ) {


        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            die("l'adresse email est incorrecte");
        }
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_ARGON2ID);
        $tel = strip_tags($_POST['tel']);

        $requete = $bdd->prepare('INSERT INTO user(mail, mdp, telephone) VALUES(?,?,?)');
        $requete->execute(array($email, $password, $tel));
    }
}




||||||| f295fad

$requete = $bdd->prepare('SELECT * FROM situations');
$requete->execute();
$situations = $requete->fetchAll(PDO::FETCH_ASSOC);




if (!empty($_POST)) {

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
}




=======
>>>>>>> martin
?>


<<<<<<< HEAD


<form action="" method="POST">
||||||| f295fad
<form action="" method="POST">
=======
<div class="carte">
    <div class="carte-eleves">
>>>>>>> martin

        <h3>Eleves</h3>
        <a href="inseleves.php">Voir</a>
    </div>

<<<<<<< HEAD
||||||| f295fad
    <div>

        <label for="situation"></label>
=======
    <div class="carte-professionnels">

        <h3>Professionnels</h3>
        <a href="insentreprise.php">Voir</a>
>>>>>>> martin

<<<<<<< HEAD


    <button type="submit">envoyer</button>


</form>
<?php
include '../inc/inc_bottom.php';
||||||| f295fad
        <select name="situation" id="situation">
            <option value="">--situation--</option>
            <?php foreach ($situations as $situation) { ?>
                <option value="<?= $situation['id_situation'] ?>"><?= $situation['label_situation'] ?></option>
            <?php } ?>
        </select>
    </div>


    <button type="submit">envoyer</button>


</form>
=======
    </div>
</div>      
>>>>>>> martin
