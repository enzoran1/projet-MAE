<?php 


function editProfileStudent() { 
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
    if(isset($_GET['editProfile']) == "eleve" )
    { 
        $formulaire = editProfileStudent();
    } 
    if(isset($_GET['editProfile']) == "pro" ){ 
        $formulaire = editProfilePro();
    }
    echo $formulaire;
}







?>

