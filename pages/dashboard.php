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

<h2> <a href="../pages/deconnexion.php"> Deconnexion </a> </h2>

<?php include '../inc/inc_bottom.php'; ?>