<?php
include '../inc/inc_top.php';
include '../pages/cobdd.php';


$_SESSION['situations'] = 1;

if (!empty($_POST['submit'])) 
{ // On vérifie que le submit est lancé et que tous les champs sont remplis 

    if (
            !empty          ($_POST['email']) 
            && !empty       ($_POST['email']) 
            && !empty       ($_POST['password']) 
            //&& !empty       ($_POST['civilite'])
            && !empty       ($_POST['nom'])
            && !empty       ($_POST['prenom'])
            && !empty       ($_POST['tel'])
            && !empty       ($_POST['entreprise'])
            //&& !empty       ($_POST['categorie'])
            && !empty       ($_POST['secteur'])
            && !empty       ($_POST['adresse'])
            && !empty       ($_POST['postal'])
            && !empty       ($_POST['ville'])
        ) 
    {

        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $tel = $_POST['tel'];
        //$civilite = $_POST['civilite'];        
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $entreprise = $_POST['entreprise'];
        //$categorie = $_POST['categorie'];
        $secteur = $_POST['secteur'];
        $site = $_POST['site'];
        $adresse = $_POST['adresse'];
        $postal = $_POST['postal'];
        $ville = $_POST['ville'];

        $requestEmailExist = $bdd->prepare("SELECT * FROM user WHERE email ='".$email."'");
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
                'INSERT INTO user(email, mdp, /*civilite,*/telephone, nom, prenom, nom_entreprise, /*categorie,*/ titre, site_entreprise, id_ville, cp_ville, nom_ville) 
                VALUES(?,?,?,?,?,?,?,?,?,?,?)'
            );

            $requete->execute(array($email, $password, $tel, /*$civilite,*/$nom, $prenom, $entreprise, /*$categorie,*/ $secteur, $site, $adresse, $postal, $ville)); 

            $_SESSION['email'] = $email;

            

            
            
            echo 'Vous êtes enregistré en tant que recruteur. Félicitations ! Veuillez maintenant vous connecter
            en cliquant <a href="connexion"> ici </a>';
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
    </div>  -->

    <div>
        <label for="nom">
            <input type="text" name="nom" id="nom" placeholder="Nom">
        </label>
    </div>

    <div>
        <label for="prenom">
            <input type="text" name="prenom" id="prenom" placeholder="Prénom">
        </label>
    </div>

    <div>
        <label for="tel">
            <input type="text" name="tel" id="tel" placeholder="Téléphone">
        </label>
    </div>

    <div>
        <label for="email">
            <input type="email" name="email" id="email" placeholder="Email">
        </label>
    </div>
    <div>
        <label for="password">
            <input type="password" name="password" id="password" placeholder="Mot de passe">
        </label>
    </div>

    <div>
        <label for="entreprise">
            <input type="text" name="entreprise" id="entreprise" placeholder="Nom de l'entreprise">
        </label>
    </div>
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
            <input type="text" name="secteur" id="secteur" placeholder="Secteur d'activité">
        </label>
    </div>

    <div>
        <label for="site">
            <input type="text" name="site" id="site" placeholder="Site web">
        </label>
    </div>

    <div>
        <label for="adresse">
            <input type="text" name="adresse" id="adresse" placeholder="Adresse">
        </label>
    </div>

    <div>
        <label for="postal">
            <input type="text" name="postal" id="postal" placeholder="Code postal">
        </label>
    </div>

    <div>
        <label for="ville">
            <input type="text" name="ville" id="ville" placeholder="Ville">
        </label>
    </div>




    <button type="submit" name="submit" value='submit'>Envoyer</button>

</form>


<?php include '../inc/inc_bottom.php'; ?>