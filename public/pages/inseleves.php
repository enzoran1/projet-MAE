<?php
include '../inc/inc_top.php';
include '../pages/cobdd.php';

// $requete = $bdd->prepare('SELECT * FROM situations');
// $requete->execute();
// $situations = $requete->fetchAll(PDO::FETCH_ASSOC);


if (!empty($_POST['submit'])) { // On vérifie que le submit est lancé et que tous les champs sont remlis 

    if (
        !empty($_POST['email'])
        && !empty($_POST['email'])
        && !empty($_POST['password'])
        && !empty($_POST['tel'])
    ) {

        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $tel = $_POST['tel'];

        $requestEmailExist = $bdd->prepare("SELECT * FROM user WHERE email ='" . $email . "'");
        $requestEmailExist->execute();;
        $count = $requestEmailExist->rowCount(); // renvoi 0 si l'user n'existe pas... 1 s'il existe


        if ($count > 0) {
            echo 'L\'email que vous avez utilisé existe déjà.';
            session_destroy();
            die;
        } else {
            // dans le cas ou count est égal à 0, donc nouvel email on continue
            $requete = $bdd->prepare(
                'INSERT INTO user(email, mdp, telephone) 
                VALUES(?,?,?)'
            );

            $requete->execute(array($email, $password, $tel));

            $_SESSION['email'] = $email;
            $_SESSION['value'] = "eleve";




            echo 'Vous êtes enregistré en tant qu\'élèves. Félicitations ! Veuillez maintenant vous connecter
            en cliquant <a href="connexion"> ici </a>';
            session_destroy();
        }
    }
}
?>


<form action="" method="POST" class="formulaire">
    <div class="formulaire__container">
        <h3>Inscription</h3>
        <div class="formulaire__contenue">
            <label for="email">
                <input type="email" name="email" id="email" placeholder="email">
            </label>
        </div>
        <div class="formulaire__contenue">
            <label for="password">
                <input type="password" name="password" id="password" placeholder="password">
            </label>
        </div>
        <div class="formulaire__contenue">
            <label for="tel">
                <input type="text" name="tel" id="tel" placeholder="tel">
            </label>
        </div>



        <button type="submit" name="submit" value='submit'>Envoyer</button>
    </div>

</form>