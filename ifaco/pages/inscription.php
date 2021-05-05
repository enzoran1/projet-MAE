<?php

include '../inc/inc_top.php';
include './cobdd.php';

$requete = $bdd->prepare('SELECT * FROM professions');
$requete->execute();
$professions = $requete->fetchAll(PDO::FETCH_ASSOC);

$requete = $bdd->prepare('SELECT * FROM secteurs');
$requete->execute();
$secteurs = $requete->fetchAll(PDO::FETCH_ASSOC);

$requete = $bdd->prepare('SELECT * FROM villes');
$requete->execute();
$villes = $requete->fetchAll(PDO::FETCH_ASSOC);



if (!empty($_POST)) {

    if (
        isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['password'], $_POST['tel'], $_POST['profession'], $_POST['secteur'], $_POST['ville'])
        && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) &&
        !empty($_POST['tel']) && !empty($_POST['profession']) && !empty($_POST['secteur']) && !empty($_POST['ville'])


    ) {

        $prenom = strip_tags($_POST['prenom']);
        $nom = strip_tags($_POST['nom']);
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            die("l'adresse email est incorrecte");
        }
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_ARGON2ID);
        $tel = $_POST['tel'];
        $profession = $_POST['profession'];

        $secteur = $_POST['secteur'];
        $ville = $_POST['ville'];


        $requete = $bdd->prepare('INSERT INTO users(prenom, nom, email, password, tel, profession, secteur
        ,ville) VALUES(?,?,?,?,?,?,?,?)');
        $requete->execute(array($prenom, $nom, $email, $password, $tel, $profession, $secteur, $ville));
    } else {
        die("le formulaire est incomplet");
    }
}



?>


<form action="" method="POST">
    <div>
        <label for="prenom">
            <input type="text" name="prenom" id="prenom" placeholder="prenom">
        </label>
    </div>
    <div>
        <label for="nom">
            <input type="text" name="nom" id="nom" placeholder="nom">
        </label>
    </div>
    <div>
        <label for="email">
            <input type="email" name="email" id="email" placeholder="email">
        </label>
    </div>
    <div>
        <label for="password">
            <input type="password" name="password" id="password" placeholder="mot de passe">
        </label>
    </div>
    <div>
        <label for="tel">
            <input type="tel" name="tel" id="tel" placeholder="tel">
        </label>
    </div>
    <div>

        <label for="profession"></label>

        <select name="profession" id="profession">
            <option value="">--Profession--</option>
            <?php foreach ($professions as $profession) { ?>
                <option value="<?= $profession['id_profession'] ?>"><?= $profession['label_profession'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label for="secteur"></label>

        <select name="secteur" id="secteur">
            <option value="">--Secteur--</option>
            <?php foreach ($secteurs as $secteur) { ?>
                <option value="<?= $secteur['id_secteur'] ?>"><?= $secteur['label_secteur'] ?></option>
            <?php } ?>
        </select>
    </div>


    <div>


        <label for="ville"></label>

        <select name="ville" id="ville">
            <option value="">--Ville--</option>

            <?php foreach ($villes as $ville) { ?>
                <option value="<?= $ville['id_ville'] ?>"><?= $ville['label_ville'] ?></option>
            <?php } ?>

        </select>
    </div>

    <button type="submit">envoyer</button>


</form>