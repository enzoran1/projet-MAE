<!-- if (!empty($_SESSION['email'])) {
    echo 'Vous êtes déjà connecté(e)';
    die;
}
?> -->

<!-- <div class="carte">
    <div class="carte-eleves">

        <h3>Eleves</h3>
        <a href="inseleves.php">Voir</a>
    </div>

    <div class="carte-professionnels">

        <h3>Professionnels</h3>
        <a href="insentreprise.php">Voir</a>
    </div> -->

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