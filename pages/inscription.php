<?php
include '../inc/inc_top.php';
include '../pages/cobdd.php';


if(!empty($_SESSION['email']))
{
    echo 'Vous êtes déjà connecté';
    ob_clean();
    header('Location: dashboard.php');
    die;
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



<?php include '../inc/inc_bottom.php'; ?>