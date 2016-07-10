<?php
session_start();
include_once 'mvc/controleur/autoload.php';

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Publier un évènement (suite) </title>

    <?php include 'include/headerfile.php' ?>

    <script src="https://code.jquery.com/jquery-3.0.0.min.js"
            integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>

    <link href="css/upload.css" rel="stylesheet"/>

    <link rel="stylesheet" href="css/pulierArticle.css">

</head>
<body>


<?php include 'include/navbar.php' ?>


<form class="form-horizontal" id="form" enctype="multipart/form-data" method="post"
      action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>">
    <fieldset>


        <legend>Publication d'évènement (2/2)</legend>

        <div class="row">

            <div class="col-xs-12 col-md-12 col-lg-3">
                <h4>Photo de couverture</h4>
                <div id="filediv_couv"><input accept="image/*"
                        name="file[]" type="file" id="file_couv"/></div>
                <br/>

                <input type="button" id="add_more_couv" class="upload" value="Plus de photos"/>

            </div>


            <div class="col-xs-12 col-md-12 col-lg-3 ">
                <h4>Sponsor</h4>
                <div id="filediv_spon"><input accept="image/*"
                        name="file_spon[]" type="file" id="file_spon"/></div>
                <br/>

                <input type="button" id="add_more_spon" class="upload" value="Plus de photos"/>
            </div>


            <div class="col-xs-12 col-md-12 col-lg-3">
                <h4>Autres</h4>
                <div id="filediv_autr"><input accept="image/*"
                        name="file_autr[]" type="file" id="file_autr"/></div>
                <br/>

                <input type="button" id="add_more_autr" class="upload" value="Plus de photos"/>
            </div>


            <div class="col-xs-12 col-md-12 col-lg-3 ">
                <h4>Organisateur</h4>
                <div id="filediv_org"><input accept="image/*"
                        name="file_org[]" type="file" id="file_org"/></div>
                <br/>

                <input type="button" id="add_more_org" class="upload" value="Plus de photos"/>
            </div>

        </div>

        <div class="row">

            <div class="col-xs-12 col-md-12 col-lg-3 ">
                <h4>Photo représentative</h4>
                <div id="filediv_rep"><input accept="image/*"
                                             name="file_rep[]" type="file" id="file_rep"/></div>
                <br/>
            </div>

        </div>


        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-8">

                <button onclick="window.location.href='nvoeve.php'; return false;"
                        type="button" class="btn btn-warning btn-lg btn3d">
                    <span class="glyphicon glyphicon-arrow-left"></span> Retour
                </button>

                <button type="submit" class="btn btn-success btn-lg btn3d">
                    <span class="glyphicon glyphicon-ok" id="valider"></span> Valider
                </button>

                <button type="reset" class="btn3d btn btn-danger btn-lg">
                    <span class="glyphicon glyphicon-remove"></span> Annuler
                </button>

            </div>
        </div>

    </fieldset>
</form>

<script type="text/javascript" src="js/upload.js"></script>

<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

var_dump($_SESSION);

$target_path = "dossier/";
$tab = array();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $j = 0; //Variable for indexing uploaded image
    global $target_path,$tab;


    $pdo = Connection::getConnexion();
    $evenement = new Evenement($_SESSION['nomEve'],$_SESSION['lieuEve'],$_SESSION['dateMiseEnLigneEve'],$_SESSION['datedebutEve'],
        $_SESSION['datefinEve'],$_SESSION['contactEve'],$_SESSION['prixEve'],$_SESSION['descriptionEve'],$_SESSION['iduser'],$_SESSION['typeEve']);

    $evenementManager = new EvenementManager($pdo);
    $evenementManager->createEvenement($evenement);

    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.)
        $file_extension = end($ext); //store extensions in the variable


        $target_path = $target_path . md5(uniqid()) . "." . $file_extension;
        $j = $j + 1;//increment the number of uploaded images according to the files in array

        if (($_FILES["file"]["size"][$i] < 1000000) //Approx. 1mb files can be uploaded.
            && in_array($file_extension, $validextensions)
        ) {

            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder

                echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {//if file was not moved.
                echo $j . ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }


}
?>
</body>
</html>
