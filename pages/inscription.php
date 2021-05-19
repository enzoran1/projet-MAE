<?php
include '../inc/inc_top.php';
include '../pages/cobdd.php';

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




?>


<div class="carte">
    <div class="carte-eleves">

        <h3>Eleves</h3>
        <a href="inseleves.php">Voir</a>
    </div>

    <div class="carte-professionnels">

        <h3>Professionnels</h3>
        <a href="insentreprise.php">Voir</a>

    </div>
</div>
<?php include '../inc/inc_bottom.php' ?>