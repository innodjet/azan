<?php
include_once '../mvc/controleur/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$pdo = Connection::getConnexion();

$userManager = new UserManager($pdo);

switch ($_POST['type']) {

    case 'pseudo':
        $result = $userManager->exists($_POST["pseudo"],"pseudouser");
        break;

    case 'email':
        $result = $userManager->exists($_POST["email"],"email");
        break;

    default:
        break;
}

    echo json_encode(array(
        'valid' => $result,
    ));





?>