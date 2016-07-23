<?php
session_start();

if( ($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['update'] == 'submit')
    && (isset($_POST['pseudo'])) &&  (isset($_POST['sexe']))) {

    include_once 'mvc/controleur/autoload.php';

    $pdo = Connection::getConnexion();
    $userManager = new UserManager($pdo);

    $userManager->updateUser(
        new User($_POST['pseudo'],$_POST['telephone'],$_POST['sexe'],$_POST['prenom'],$_POST['nom'],$_SESSION['id']));

    $msg = new FlashMessages();
    $msg->success('Modification effectuée avec succés! ');
    $msg->display();

}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Modification de compte</title>

    <?php include 'include/headerfile.php' ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.3.0/zxcvbn.js"></script>

    <style type="text/css">

        .fieldset{
            margin-top: 70px;
            margin-right: 40px;
            margin-left: 40px;
        }

    </style>
</head>
<body>

<?php include 'include/navbar.php' ?>


    <fieldset class="fieldset">
        <legend id="text">Mise à jour</legend>

        <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>"
              autocomplete="off" method="post" id="update_form" class="form-horizontal">


            <div class="row">
                <div class="form-group">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <input  autocomplete="off"
                               class="form-control" name="nom" placeholder="Nom" type="text"/>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <input  autocomplete="off"
                               class="form-control" name="prenom" placeholder="Prénom" type="text"/>
                    </div>
                </div>
            </div>

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


            <div class="row">
                <div class="form-group">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <input type="tel"  autocomplete="off"
                               class="form-control" name="telephone" placeholder="Telephone"/>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <input type="email"  autocomplete="off" value="koko@yahoo.fr" disabled="disabled"
                               class="form-control" name="telephone" placeholder="Telephone"/>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-xs-12 col-md-8 col-lg-8">
                    <button name="update" value="submit" class="btn btn-lg btn-primary btn-block" type="submit">
                        <span class="glyphicon glyphicon-floppy-save"></span> Modfication
                    </button>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4">
                    <button type="reset" class="btn btn-lg btn-primary btn-block btn-danger">Annuler</button>
                </div>
            </div>


        </form>


    </fieldset>



</body>
</html>

