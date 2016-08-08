<?php
include_once 'mvc/controleur/autoload.php';
session_start();


?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Acceuil</title>

    <?php include 'include/headerfile.php' ?>

    <link href="css/login.css" rel="stylesheet">


    <!-- Include events calendar css file -->
    <link rel="stylesheet" href="tiva/assets/css/calendar.css">
    <link rel="stylesheet" href="tiva/assets/css/calendar_full.css">
    <link rel="stylesheet" href="tiva/assets/css/calendar_compact.css">

    <!-- Include config file -->
    <script src="tiva/config/config.js"></script>

    <!-- Include events calendar language file -->
    <script src="tiva/assets/languages/en.js"></script>

    <!-- Include events calendar js file -->
    <script src="tiva/assets/js/calendar.js"></script>


</head>
<body>



<?php include 'include/navbar.php' ?>



<div class="row" style="margin-top: 80px">
<?php

$msg = new FlashMessages();
$msg->display();
?>
    <div class="tiva-events-calendar full" data-source="php"></div>

</div>



</body>
</html>
