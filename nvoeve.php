<?php
session_start();

if( ($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['nomEve'])) && (isset($_POST['lieuEve']))
    && (isset($_POST['prixEve']))  && (isset($_POST['dateMiseEnLigneEve']))  && (isset($_POST['datedebutEve']))  && (isset($_POST['datefinEve']))
    && (isset($_POST['contactEve'])) && (isset($_POST['descriptionEve'])) && ($_POST['valider'] == 'continuer' ) ){

    $_SESSION["nomEve"]=$_POST["nomEve"];
    $_SESSION['lieuEve']=$_POST['lieuEve'];
    $_SESSION['prixEve']=$_POST['prixEve'];
    $_SESSION['dateMiseEnLigneEve']=$_POST['dateMiseEnLigneEve'];
    $_SESSION['datedebutEve']=$_POST['datedebutEve'];
    $_SESSION['datefinEve']=$_POST['datefinEve'];
    $_SESSION['contactEve']=$_POST['contactEve'];
    $_SESSION['descriptionEve']=$_POST['descriptionEve'];

    $_SESSION['iduser']= "1";
    $_SESSION['typeEve']=$_POST['type'];

    header('Location: nvoevesuite.php');

}


?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Publier un évènement</title>

    <?php include 'include/headerfile.php' ?>

    <script type="text/javascript" src="js/moment.min.js" ></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

    <link href="css/bootstrap-datetimepicker.css" rel="stylesheet" />
    <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js" ></script>


<link rel="stylesheet" href="css/pulierArticle.css">

    <link rel="stylesheet" href="css/formValidation.min.css">
    <script type="text/javascript" src="js/formValidation.min.js" ></script>
    <script type="text/javascript" src="js/formvalidationbootstrap.min.js" ></script>
    <script type="text/javascript" src="js/formValidation.js" ></script>


</head>
<body>


<?php
include_once 'mvc/controleur/autoload.php';
include 'include/navbar.php';
?>




<form class="form-horizontal" id="formPub" method="post"
      action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>" >
    <fieldset>

        <!-- Form Name -->
        <legend>Publication d'évènement (1/2)</legend>

        <?php
        $pdo = Connection::getConnexion();
        $pdo->beginTransaction();
        $req = $pdo->prepare("select * from typeevenement ");
        $req->execute();
        $pdo->commit();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        ?>



        <!-- Type evenement -->
        <div class="form-group">
            <label class="col-md-4 control-label" >Type événement</label>
            <div class="col-md-2">
                <select name="type" class="form-control">
                    <option value="">-- Selectionner --</option>
                    <?php
                    foreach($result as $value){
                        echo "<option value=".$value['id'].">".$value['libelle']."</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <!-- Nom -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Nom</label>
            <div class="col-md-6">
                <input  name="nomEve" value="<?php echo $_SESSION['nomEve'];?>"
                        type="text" placeholder="Nom de l'évènement"
                       class="form-control input-md" autocomplete="off">
                <span class="help-block">Ex: Avépozo Party</span>
            </div>
        </div>

        <!-- Lieu -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Lieu</label>
            <div class="col-md-6">
                <input  name="lieuEve" value="<?php echo $_SESSION['lieuEve'];?>"
                        type="text" placeholder="Lieu de l'évènement"
                       class="form-control input-md" autocomplete="off" >
                <span class="help-block">Avépozo Beach</span>
            </div>
        </div>

        <!-- Prix -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Prix</label>
            <div class="col-md-4">
                <input  name="prixEve" value="<?php echo $_SESSION['prixEve'];?>"
                        type="text" placeholder="Prix de la party"
                       class="form-control input-md" autocomplete="off">
                <span class="help-block">25000</span>
            </div>
        </div>


        <!-- Date de mise en ligne -->
        <div class="form-group">
            <label class="col-md-4 control-label">Date de mise en ligne</label>
            <div class="col-md-4 date">
                <div class="input-group input-append date" id="dateML">
                    <input id="inputdateML" value="<?php echo $_SESSION['dateMiseEnLigneEve'];?>"
                           type="text" autocomplete="off"
                           class="form-control" name="dateMiseEnLigneEve" />
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
        </div>


        <!-- Date debut -->
        <div class="form-group">
            <label class="col-md-4 control-label">Date début</label>
            <div class="col-md-4 date">
                <div class="input-group input-append date" id="dateDb">
                    <input type="text" value="<?php echo $_SESSION['datedebutEve'];?>"
                           class="form-control" name="datedebutEve" autocomplete="off"/>
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
        </div>

        <!-- Date Fin -->
        <div class="form-group">
            <label class="col-md-4 control-label">Date fin</label>
            <div class="col-md-4 date">
                <div class="input-group input-append date" id="dateFin">
                    <input type="text" value="<?php echo $_SESSION['datefinEve'];?>"
                           class="form-control" autocomplete="off" name="datefinEve" />
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
        </div>

        <!-- Contact-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Contact</label>
            <div class="col-md-6">
                <input id="textinput" value="<?php echo $_SESSION['contactEve'];?>"
                       name="contactEve" type="text" autocomplete="off"
                       placeholder="Contact" class="form-control input-md">
                <span class="help-block">Tel: 00228 90 97 89 71</span>
            </div>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label class="col-md-4 control-label" >Description</label>
            <div class="col-md-4">
                <textarea class="form-control"
                          placeholder="Description" id="textarea" name="descriptionEve">
                    <?php echo trim($_SESSION['descriptionEve']);?>
                </textarea>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" ></label>
            <div class="col-md-8">


                <button
                    type="submit" class="btn btn-success btn-lg btn3d" name="valider" value="continuer">
                    <span class="glyphicon glyphicon-ok"></span> Valider & Continuer</button>

                <button type="reset" class="btn3d btn btn-danger btn-lg">
                    <span class="glyphicon glyphicon-remove"></span> Annuler</button>
            </div>
        </div>

    </fieldset>
</form>


<script>
    $(document).ready(function() {
var choix;
        $('#dateML')
            .datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                autoclose: true,
                startDate: new Date(),

            }).on('changeDate', function(e) {
                // Revalidate the date field
                //choix = document.getElementById('inputdateML').value;
                //console.log("date "+choix);
            $('#form').formValidation('revalidateField', 'dateMiseEnLigneEve');
            $('#dateDb').data("DateTimePicker").minDate(e.date);
            $('#dateFin').data("DateTimePicker").minDate(e.date);
            });



        $('#dateDb').datetimepicker({
            format: 'DD-MM-YYYY HH:mm',

        }).on('dp.change dp.show', function(e) {
            $('#dateFin').data("DateTimePicker").minDate(e.date);
            $('#form').formValidation('revalidateField', 'datedebutEve');
        });


        $('#dateFin')
            .datetimepicker({
            format: 'DD-MM-YYYY HH:mm'
        }).on('dp.change dp.show', function(e) {
            $('#form').formValidation('revalidateField', 'datefinEve');
        });


    });


</script>





</body>
</html>
