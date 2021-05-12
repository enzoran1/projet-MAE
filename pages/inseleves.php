<?php

include '../inc/inc_top.php';
include '../pages/cobdd.php';



?>

<form action="" method="POST">

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
        <label for="tel">
            <input type="text" name="tel" id="tel" placeholder="Téléphone">
        </label>
    </div>

    <div>

        <label for="situation"></label>

        <select name="situation" id="situation">
            <option value="">--situation--</option>
            <?php foreach ($situations as $situation) { ?>
                <option value="<?= $situation['id_situation'] ?>"><?= $situation['label_situation'] ?></option>
            <?php } ?>
        </select>
    </div>


    <button type="submit">S'inscrire</button>  

    <?php include '../inc/inc_bottom.php'; ?>