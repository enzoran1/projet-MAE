<?php
include '../inc/inc_top.php';
?>

<h1>Bienvenue</h1>

<h2>Vos informations</h2>

<ul>
    <li>
        Adresse E-mail :<?= $_SESSION['mail'] ?>
    </li>
    <li>
        Votre mot de passe : <?= $_SESSION['mdp'] ?>
    </li>
    <li>
        Numéro de téléphone : <? $_SESSION['telephone'] ?>
    </li>
</ul>

<form action="" method="get">
    <button type="submit" name="editProfile" class="editProfile"> Ajouter des informations à mon compte</button>
</form>

<a href="../pages/deconnexion.php"> Deconnexion </a>

<?php

if(isset($_GET['editProfile'])) { 
    var_dump($_SESSION);
    // C'est là ou nous allons trier les utilisateurs et compléter la bdd 
}





include '../inc/inc_bottom.php'; ?>