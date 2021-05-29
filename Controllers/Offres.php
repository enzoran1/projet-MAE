<?php 

Class Offres { 
    public static function index()
    { 
        require BASE_DIR . '/Views/offresView.php';
        require BASE_DIR . '/Models/offres.php';
    }
}


// foreach($query as $offre => $value)
// {  // colonnes : id_offre	titre_offre	descriptif	id_user	id_user_eleves	id_metier	
//     echo ' 
//     <div class="card" id="card">
//         <h3 class="card-title"> '.$value['titre_offre']. '</h5>
//         <p class="card-text">'.$value['descriptif']. '</p>
//         <a href="" target="_blank" class="btn btn-outline-secondary btn-lg"">En savoir plus</a>
//     </div>
//     ';
// }