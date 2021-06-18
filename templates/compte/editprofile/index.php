<form action="compte/editprofile" method="post">
    <input type="radio" id="eleve" name="role" value="eleve" checked> Eleve
    <input type="radio" id="professionel" name="role" value="professionel"> Professionnel

    <div class="proform">
        <label for="nom_entreprise"> Nom de l'entreprise
            <input type="text" id="nom_entreprise" name="nom_entreprise" value="nom_entreprise"> 
        </label>
        <label for="site_entreprise"> Site de l'entreprise
            <input type="text" id="site_entreprise" name="site_entreprise" value="site_entreprise">
        </label>
        <label for="ville">Ville
            <input type="text" id="ville" name="ville" value="ville">  
        </label> 
    </div>

    <div class="eleveform">
        <input type="text" id="" name="" value="">
    </div>
    <input type="submit" value="submit">


</form>


<?php /* En fonction de la balise radio....faire le bon traitement et afficher un formulaire différent
entreprise -> nom_entreprise
            ->site_entreprise
            ->id_ville


eleve      -> nom 
            -> prenom
            ->cursus 
            ->emploi 
            ->id_user_entreprises 
            ->id_ville 
*/ 