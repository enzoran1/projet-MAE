<?php
include '../inc/inc_top.php';
include '../pages/cobdd.php';

$_SESSION['situations'] = 1;

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
    </div>

</form>