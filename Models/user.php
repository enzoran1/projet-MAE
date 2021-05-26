<?php 

require BASE_DIR. 'Models/Database.php';

Class User { 

    public function __construct()
    {
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        $this->tel = $_POST['tel'];
    }

    public function setNewUser($bdd)
    {
        $bdd->prepare('INSERT INTO user (email, password, tel) VALUES (?, ?, ?)');
        $bdd->execute();
        $bdd->fetch(array($_POST['email'], $_POST['password'], $_POST['tel']));
    }

}