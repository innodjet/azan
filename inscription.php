<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if( ($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['sexe'])) && ($_POST['inscription'] == 'submit')
    &&  (isset($_POST['pseudo'])) && isset($_POST['email']) && (isset($_POST['password'])) ) {
    include_once 'mvc/controleur/autoload.php';
    $pdo = Connection::getConnexion();
    $userManager = new UserManager($pdo);

    $userManager->createUser(new User($_POST['pseudo'], $_POST['sexe'], $_POST['email'], date('Y-m-d'), $_POST['password']));

    $msg = new FlashMessages();
    $msg->success("Inscription effectuée avec succès; un message de confirmation vous a été envoyé à cette adresse email : ".$_POST['email'], 'index.php');
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Inscription</title>

    <?php include 'include/headerfile.php' ?>

    <link rel="stylesheet" href="css/inscription.css"/>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.3.0/zxcvbn.js"></script>
</head>
<body>

<?php include 'include/navbar.php' ?>



<div class="box ">

    <?php


    ?>

    <fieldset>
        <legend id="text">Inscription</legend>

        <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>" role="form"
              autocomplete="off" method="post" id="inscription_form" class="form-horizontal">


            <div class="row">
                <div class="form-group">
                    <div class="col-xs-12 col-md-8 col-lg-8">
                        <input required autocomplete="off"
                               class="form-control" name="pseudo" placeholder="Pseudo" type="text"/>
                    </div>

                    <div class="col-xs-12 col-md-4 col-lg-4 form-inline ">
                        <label class="radio-inline">
                            <input type="radio" name="sexe" value="M" checked="checked">M
                        </label>
                        <label class="radio-inline" for="radios-1">
                            <input type="radio" name="sexe" value="F">F
                        </label>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="email" required autocomplete="off"
                           class="form-control" name="email" placeholder="Adresse Email"/>
                </div>

            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input class="form-control" required name="password"
                           autocomplete="off" placeholder="Mot de passe" type="password"/>
                </div>

                <div class="progress password-progress">
                    <div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0;"></div>
                </div>
            </div>


            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input class="form-control" type="password"
                           autocomplete="off" required name="password2" placeholder="Verification du mot de passe"/>
                </div>

                <div class="progress password-progress">
                    <div id="strengthBar2" class="progress-bar" role="progressbar" style="width: 0;"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-8 col-lg-8">
                    <button name="inscription" value="submit" class="btn btn-lg btn-primary btn-block" type="submit">
                        <span class="glyphicon glyphicon-floppy-save"></span> Inscription
                    </button>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4">
                    <button type="reset" class="btn btn-lg btn-primary btn-block btn-danger">Annuler</button>
                </div>
            </div>


        </form>


    </fieldset>


</div>


</body>
</html>

