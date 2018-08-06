
<?php
    
include '../includes/connect.php';

use \Colors\RandomColor;

include '../vendor/autoload.php';

$pseudo = htmlspecialchars($_POST['pseudo']);
$message = htmlspecialchars($_POST['message']);


$req = $bdd->prepare('INSERT INTO minichat (pseudo, message, date, ip, UserAgent) VALUES (?, ?, NOW(), ?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']));



$PseudoExist = $bdd->prepare('SELECT count(*) FROM users WHERE pseudo = ?');
$PseudoExist->execute(array($_POST['pseudo']));



if($PseudoExist->fetchColumn() === "0"){

    $PseudoExist = $bdd->prepare('INSERT INTO users (pseudo, color) VALUES (?, ?)');
    $PseudoExist->execute(array($_POST['pseudo'], RandomColor::one()));
}
else{
    echo 'error';
}

setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
header("location: ../index.php");

?>

