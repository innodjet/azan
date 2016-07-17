<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ((isset($_GET['azan'])) AND ((int)$_GET['azan'] != 0)) {
    include_once '../mvc/controleur/autoload.php';
    $id = $_GET['azan'];
    $pdo = Connection::getConnexion();

    $evenementManager = new EvenementManager($pdo);
    $evenement = $evenementManager->getEvenementById($id);

    $dateDebut = $evenement->getDateDb();
    var_dump($dateDebut);
    echo date_format($dateDebut, 'g:ia \o\n l jS F Y');


    $userManager = new UserManager($pdo);
    $user = $userManager->getUserById($evenement->getUser());

    $photoManager = new PhotosManager($pdo);
    $photos = $photoManager->getPhotosById($evenement->getId());

} else {
    header('Location: ../searcheve.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $evenement->getNom(); ?></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header" role="banner">
    <div class="main-nav">
        <div class="container">

            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php">
                        <img class="img-responsive" src="images/logo.png" alt="logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="scroll active"><a href="#home">Home</a></li>
                        <li class="scroll"><a href="#explore">Decompte</a></li>
                        <li class="scroll"><a href="#event">Organisateur</a></li>
                        <li class="scroll"><a href="#about">Description</a></li>
                        <li class="scroll"><a href="#sponsor">Sponsor</a></li>
                        <li class="scroll"><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!--/#header-->

<section id="home">
    <div id="main-slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            <?php
            $j = 0;

            for ($i = 0;$i < sizeof($photos);$i++) {

            if ($photos[$i]->getTypePhoto() == 1) {
            $j++;
            $str = ($j == 1) ? '<div class="item active">' : '<div class="item">';
            echo $str;
            ?>

            <img class="img-responsive" alt="slider" style="height: 1000px; " src="../images/<?php echo $photos[$i]->getLien(); ?>">
            <div class="carousel-caption">
                <h4><?php echo $evenement->getNom(); ?></h4>
            </div>
        </div>
        <?php
        }
        }
        ?>
    </div>
    </div>

</section>
<!--/#home-->

<section id="explore">
    <div class="container">
        <div class="row">
            <div class="watch">
                <img class="img-responsive" src="images/watch.png" alt="">
            </div>
            <div class="col-md-4 col-md-offset-2 col-sm-5">
                <h2></h2>
            </div>
            <div class="col-sm-7 col-md-6">
                <ul id="countdown">
                    <li>
                        <span class="days time-font">00</span>
                        <p>Jours </p>
                    </li>
                    <li>
                        <span class="hours time-font">00</span>
                        <p class="">Heure </p>
                    </li>
                    <li>
                        <span class="minutes time-font">00</span>
                        <p class="">Minutes</p>
                    </li>
                    <li>
                        <span class="seconds time-font">00</span>
                        <p class="">Seconds</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="cart">
            <a href="../index.php"><i class="fa fa-home"></i> <span>Acceuil</span></a>
        </div>
    </div>
</section><!--/#explore-->

<section id="event">
    <?php include 'include/album.php' ?>
</section><!--/#event-->

<section id="about">
    <div class="guitar2">
        <img class="img-responsive" src="images/guitar2.jpg" alt="guitar">
    </div>
    <div class="about-content">
        <h2>Description</h2>
        <p><?php echo $evenement->getDesription(); ?></p>

    </div>
</section><!--/#about-->


<section id="sponsor">
    <?php include 'include/sponsor.php' ?>
</section><!--/#sponsor-->

<section id="contact">

    <div class="contact-section">
        <div class="ear-piece">
            <img class="img-responsive" src="images/ear-piece.png" alt="">
        </div>
        <?php include 'include/contact.php' ?>
    </div>
</section>
<!--/#contact-->

<?php include 'include/footer.php' ?>
<!--/#footer-->

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.parallax.js"></script>
<script type="text/javascript" src="js/coundown-timer.js"></script>
<script type="text/javascript" src="js/jquery.scrollTo.js"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>