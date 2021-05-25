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
        Votre mot de passe : <?= $_SESSION['password'] ?>
    </li>
    <li>
        Numéro de téléphone : <?= $_SESSION['telephone'] ?>
    </li>
</ul>

<form action="" method="get">
    <button type="submit" name="editProfile" class="editProfile"> Ajouter des informations à mon compte</button>
</form>

<?php
if(isset($_GET['editProfile'])) {  
    if($_SESSION['poste'] == "eleve")
    { 
        $_GET['editProfile'] = 'eleve';
    }
    if($_SESSION['poste'] == 'pro')
    { 
        $_GET['editProfile'] = 'pro';
    }
}
    require 'formEditProfile.php';
    require 'cobdd.php';
    include '../inc/inc_bottom.php';
?>