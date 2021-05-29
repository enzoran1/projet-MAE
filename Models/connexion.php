<?php 
$queryEmail = $bdd->prepare('SELECT email FROM user WHERE user.email = :email');
$queryEmail->bindParam(':email', $_POST['email']);
$queryEmail->execute();

if($queryEmail->rowCount() > 0 )
{ 
    $queryEmail->closeCursor();
    
    $queryPassword = $bdd->prepare('SELECT password FROM user WHERE user.password = :password');
    $queryPassword->bindParam(':password', $_POST['password']);
    $queryPassword->execute();
    if($queryPassword->rowCount() > 0 )
    { 
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password']; 
        $queryTel = $bdd->prepare('SELECT telephone from user WHERE user.password = :password');
        $queryTel->bindParam(':password', $_POST['password']);
        $queryTel->execute();
        $telephone = implode($queryTel->fetch());
        $_SESSION['telephone'] = $telephone;
    } 
    else 
    { 
        echo 'Mot de passe incorrect';
    }
}
else
{
    echo 'Identifiant incorrect';
}
?>

