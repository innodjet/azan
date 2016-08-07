<?php
session_start();
include_once 'mvc/controleur/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET['pcaisas'])){

    $pdo = Connection::getConnexion();
    $userManager = new UserManager($pdo);
    $code = $_GET["pcaisas"];

    if(!$userManager->exists($code, 'codeactivation')){
       $user = $userManager->getUser('codeactivation', $code);
        if($user->getActive() == 0){
            //On procéde à l'activation du compte
            $userManager->updateUserByColumn('active', 1, $user->getId());
            $msg = new FlashMessages();
            $msg->success("Votre compte vient d'être activé, il vous reste qu'à se connecter. Merci !", 'index.php');

        }else{
            //Ce compte est déja activé
            $msg = new FlashMessages();
            $msg->warning("Cet compte est déjà activé par le passé, il vous reste qu'à se connecter. Merci !", 'index.php');
        }
    }else{
        //La clé est fausse
        $msg = new FlashMessages();
        $msg->error("Erreur lors de l'activation! Enfin arrêter de modifier le lien", 'index.php');
    }


}else{
Utilities::POST_redirect('index.php');
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Activation de compte</title>

    <?php include 'include/headerfile.php' ?>

    <link href="css/login.css" rel="stylesheet">

    <link rel="stylesheet" href="css/inscription.css"/>


</head>
<body>



<?php include 'include/navbar.php' ?>


<div class="box ">

    <?php


    ?>

    <fieldset>
        <legend id="text">Activation de compte </legend>




    </fieldset>


</div>


</body>
</html>
