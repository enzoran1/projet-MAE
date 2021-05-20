<?php
include '../inc/inc_top.php';
include '../pages/cobdd.php';

// $requete = $bdd->prepare('SELECT * FROM situations');
// $requete->execute();
// $situations = $requete->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['situations'] = 1;

if (!empty($_POST['submit'])) 
{ // On vérifie que le submit est lancé et que tous les champs sont remlis 

    if (
            !empty          ($_POST['mail']) 
            && !empty       ($_POST['mail']) 
            && !empty       ($_POST['mdp']) 
            && !empty       ($_POST['telephone'])
        ) 
    {

        $mail = $_POST['mail'];
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $telephone = $_POST['telephone'];

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
                'INSERT INTO user(mail, mdp, telephone) 
                VALUES(?,?,?)'
            );

            $requete->execute(array($mail, $mdp, $telephone)); 

            $_SESSION['mail'] = $mail;

            

            
            
            echo 'Vous êtes enregistré en tant qu\'élèves. Félicitations ! Veuillez maintenant vous connecter
            en cliquant <a href="../pages/connexion"> ici </a>';
            session_destroy();
        }
    }   
} 
?>


<form action="" method="POST">

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
    <div>
        <label for="tel">
            <input type="text" name="telephone" id="telephone" placeholder="Téléphone">
        </label>
    </div>

    <!-- <div>
        <label for="situation"></label>

        <select name="situation" id="situation">
            <option value="">-- situation --</option>
            <?php /* foreach ($situations as $situation) { ?>
                <option value="<?= $situation['id_situation'] ?>"><?= $situation['label_situation'] */ ?></option>
            <?php /* } */ ?>
        </select>
    </div> -->


    <button type="submit" name="submit" value='submit'>Envoyer</button>

</form>

<?php include '../inc/inc_bottom.php'; ?>