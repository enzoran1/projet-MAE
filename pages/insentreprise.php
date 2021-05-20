<?php
include '../inc/inc_top.php';
include '../pages/cobdd.php';


$_SESSION['situations'] = 1;

if (!empty($_POST['submit'])) 
{ // On vérifie que le submit est lancé et que tous les champs sont remplis 

    if (
            !empty          ($_POST['mail']) 
            && !empty       ($_POST['mail']) 
            && !empty       ($_POST['mdp']) 
            //&& !empty       ($_POST['civilite'])
            //&& !empty       ($_POST['nom'])
            //&& !empty       ($_POST['prenom'])
            && !empty       ($_POST['telephone'])
            //&& !empty       ($_POST['nom_entreprise'])
            //&& !empty       ($_POST['categorie'])
            && !empty       ($_POST['titre'])
            && !empty       ($_POST['site_entreprise'])
            && !empty       ($_POST['id_ville'])
            && !empty       ($_POST['cp_ville'])
            && !empty       ($_POST['nom_ville'])
        ) 
    {

        $mail = $_POST['mail'];
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $telephone = $_POST['telephone'];
        //$civilite = $_POST['civilite'];        
        //$nom = $_POST['nom'];
        //$prenom = $_POST['prenom'];
        //$nom_entreprise = $_POST['nom_entreprise'];
        //$categorie = $_POST['categorie'];
        $titre = $_POST['titre'];
        $site_entreprise = $_POST['site_entreprise'];
        $id_ville = $_POST['id_ville'];
        $cp_ville = $_POST['cp_ville'];
        $nom_ville = $_POST['nom_ville'];

        $requestEmailExist = $bdd->prepare("SELECT * FROM user WHERE mail ='".$mail."'");
        $requestEmailExist->execute();;
        $count = $requestEmailExist->rowCount(); // renvoi 0 si l'user n'existe pas... 1 s'il existe


        if($count > 0) 
        { 
            echo 'L\'email que vous avez utilisé existe déjà.';
            session_destroy();
            die;
        } 
        else
        { 
            // dans le cas ou count est égal à 0, donc nouvel email on continue
            $requete = $bdd->prepare(
                'INSERT INTO user(mail, mdp, /*civilite,*/telephone, /*nom, prenom, nom_entreprise, categorie,*/ titre, site_entreprise, id_ville, cp_ville, nom_ville) 
                VALUES(?,?,?,?,?,?,?,?)'
            );

            $requete->execute(array($mail, $mdp, $telephone, /*$civilite,$nom, $prenom, $nom_entreprise, $categorie,*/ $titre, $site_entreprise, $id_ville, $cp_ville, $nom_ville)); 

            $_SESSION['mail'] = $mail;

            

            
            
            echo 'Vous êtes enregistré en tant que recruteur. Félicitations ! Veuillez maintenant vous connecter
            en cliquant <a href="../pages/connexion"> ici </a>';
            session_destroy();
        }
    }   
} 
?>








<form action="" method="POST">

<!--
    <div>
        <form>
        <select name="civilite" id="civilite">
        <option value="">Choisissez une civilité</option>
        <option value="M.">M.</option>
        <option value="Mme">Mme</option>
        </select>
        </form>
    </div>  

    <div>
        <label for="nom">
            <input type="text" name="nom" id="nom" placeholder="Nom">
        </label>
    </div>

    <div>
        <label for="prenom">
            <input type="text" name="prenom" id="prenom" placeholder="Prénom">
        </label>
    </div> -->

    <div>
        <label for="tel">
            <input type="text" name="telephone" id="telephone" placeholder="Téléphone">
        </label>
    </div>

    <div>
        <label for="email">
            <input type="email" name="mail" id="mail" placeholder="Email">
        </label>
    </div>
    <div>
        <label for="password">
            <input type="password" name="mdp" id="mdp" placeholder="Mot de passe">
        </label>
    </div>
<!--
    <div>
        <label for="entreprise">
            <input type="text" name="nom_entreprise" id="nom_entreprise" placeholder="Nom de l'entreprise">
        </label>
    </div> -->
<!--
    <div>
        <form>
        <select name="categorie" id="categorie">
        <option value="">Choisissez une catégorie</option>
        <option value="Publique">Entreprise publique, Association</option>
        <option value="Prive">Entreprise privée</option>
        <option value="Cabinet">Cabinet de Recrutement</option>
        <option value="Chasseur">Chasseur de tête</option>
        <option value="Freelance">Freelance</option>
        </select>
        </form>
    </div>  -->

    <div>
        <label for="secteur">
            <input type="text" name="titre" id="titre" placeholder="Secteur d'activité">
        </label>
    </div>

    <div>
        <label for="site">
            <input type="text" name="site_entreprise" id="site_entreprise" placeholder="Site web">
        </label>
    </div>

    <div>
        <label for="adresse">
            <input type="text" name="id_ville" id="id_ville" placeholder="Adresse">
        </label>
    </div>

    <div>
        <label for="postal">
            <input type="text" name="cp_ville" id="cp_ville" placeholder="Code postal">
        </label>
    </div>

    <div>
        <label for="ville">
            <input type="text" name="nom_ville" id="nom_ville" placeholder="Ville">
        </label>
    </div>




    <button type="submit" name="submit" value='submit'>Envoyer</button>

</form>


<?php include '../inc/inc_bottom.php'; ?>