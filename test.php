<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title> Example</title>



</head>
<body>


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'mvc/controleur/autoload.php';
$pdo = Connection::getConnexion();

$manager = new UserManager($pdo);
var_dump( $manager->checkLogin("miatowo@yahoo.fr","miatowo@yahoo.fr"));


?>


</body>

</html>