<?php 
function editProfileStudent() {  // SQL -> transfère user vers eleves ou pro 
    $formulaire = '
    
<form action="" method="post" class="formulaireeditProfile">
    <div class="formulaire__container">
        <h3>Informations supplémentaires</h3>
        <div class="formulaire__contenue">
            <label for="nom">
                <input type="nom" name="nom" id="nom" placeholder="nom">
            </label>
        </div>
        <div class="formulaire__contenue">
            <label for="prenom">
                <input type="prenom" name="prenom" id="prenom" placeholder="prenom">
            </label>
        </div>
        <div class="formulaire__contenue">
            <label for="cursus">
                <input type="cursus" name="cursus" id="cursus" placeholder="cursus">
            </label>
        </div>
        <div class="formulaire__contenue">
            <label for="emploi">
                <input type="emploi" name="emploi" id="emploi" placeholder="emploi">
            </label>
        </div>
        <div class="formulaire__contenue">
            <label for="ville">
                <input type="ville" name="ville" id="ville" placeholder="ville">
            </label>
        </div>

        <button type="submit" name="submit" value="submit">Envoyer</button>
    </div>
</form>
    ';
    return $formulaire;
}

function editProfilePro() { 
    $formulaire = '
    <form action="" method="POST" class="formulaireeditProfile">
        <div class="formulaire__container">
            <h3>Informations supplémentaires</h3>
            <div class="formulaire__contenue">
                <label for="nom">
                    <input type="nom" name="nom" id="nom" placeholder="nom">
                </label>
            </div>
            <div class="formulaire__contenue">
                <label for="site">
                    <input type="site" name="site" id="site" placeholder="site">
                </label>
            </div>
            <button type="submit" name="submit" value="submit">Envoyer</button>
        </div>

    </form>
    ';
    return $formulaire;
}




if(isset($_GET['editProfile'])){ 
    if($_SESSION['poste'] == 'eleve')
        { 
            $formulaire = editProfileStudent();
        } 
        if($_SESSION['poste'] == 'pro') 
        {
            $formulaire = editProfilePro();
        }
    echo $formulaire;
}

function queryStudent() // requêtes de transfert user -> eleves
{
    require 'cobdd.php';
    if(isset($_POST['nom']) 
    && isset($_POST['prenom']) 
    && isset($_POST['cursus']) 
    && isset($_POST['emploi']) 
    && isset($_POST['ville'])) { 
        $query = $bdd->prepare('INSERT INTO eleves 
            (id_user, nom, prenom, cursus, emploi, id_ville)
            VALUES (?, ?, ?, ?, ?, ?) ');

        $query->execute(array( $_SESSION['id'] ,$_POST['nom'], $_POST['prenom'], $_POST['cursus'], $_POST['emploi'], intval($_POST['ville'])));
        $query->fetch();
        echo 'votre profil a été mis à jour';
    }
}

function queryPro() 
{ 
    require 'cobdd.php';
    if (isset ($_POST['id_user']) 
        && ($_POST['nom_entreprise ']) 
        && ($_POST['site_entreprise']) 
        && ($_POST['id_ville']) )
    { 
        $query = $bdd->prepare('INSERT INTO entreprises (id_user, nom_entreprise, site_entreprise, id_ville) VALUES (?, ?, ?, ?)');
        $query->execute(array($_SESSION['id'], $_POST['nom_entreprise'], $_POST['site_entreprise'], $_POST['id_ville']));
        $query->fetch();
        echo 'votre profil a été mis à jour';
    }
}

if(isset($_POST['submit']))
{ 
    if($_SESSION['poste'] == 'eleve')
    { 
        $formulaire = queryStudent();
    } 
    if($_SESSION['poste'] == 'pro') 
    {
        $formulaire = queryPro();
    }
}

?>

