<?php
include '../inc/inc_top.php';
?>

<h1>Bienvenue</h1>

<h2>Vos informations</h2>

<ul>
    <li>
        Adresse E-mail :<?= $_SESSION['email'] ?>
    </li>
    <li>
        Votre mot de passe : <?= $_SESSION['mdp'] ?>
    </li>
    <li>
        Numéro de téléphone : <? $_SESSION['telephone'] ?>
    </li>
</ul>

<?php include 'inc/inc_bottom.php'; ?>