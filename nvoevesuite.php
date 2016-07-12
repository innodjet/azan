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

    <link rel="stylesheet" href="css/formValidation.min.css">

    <script type="text/javascript" src="js/formValidation.min.js"></script>
    <script type="text/javascript" src="js/formvalidationbootstrap.min.js"></script>
    <script type="text/javascript" src="js/formValidation.js"></script>

    <script type="text/javascript" src="js/upload.js"></script>

</head>
<body>


<?php include 'include/navbar.php' ?>


<form class="form-horizontal" id="formPubSuite" enctype="multipart/form-data" method="post"
      action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>">
    <fieldset>


        <legend>Publication d'évènement (2/2)</legend>

        <div class="row">

            <div class="col-xs-12 col-md-12 col-lg-3">
                <h4>Photo de couverture</h4>
                <div id="filediv_couv"><input required accept="image/*"
                                              name="file_couv[]" type="file" id="file_couv"/></div>
                <br/>

                <input type="button" id="add_more_couv" class="upload" value="Plus de photos"/>

            </div>


            <div class="col-xs-12 col-md-12 col-lg-3 ">
                <h4>Sponsor</h4>
                <div id="filediv_spon"><input required accept="image/*"
                                              name="file_spon[]" type="file" id="file_spon"/></div>
                <br/>

                <input type="button" id="add_more_spon" class="upload" value="Plus de photos"/>
            </div>


            <div class="col-xs-12 col-md-12 col-lg-3">
                <h4>Autres</h4>
                <div id="filediv_autr"><input required accept="image/*"
                                              name="file_autr[]" type="file" id="file_autr"/></div>
                <br/>

                <input type="button" id="add_more_autr" class="upload" value="Plus de photos"/>
            </div>


            <div class="col-xs-12 col-md-12 col-lg-3 ">
                <h4>Organisateur</h4>
                <div id="filediv_org"><input required accept="image/*"
                                             name="file_org[]" type="file" id="file_org"/></div>
                <br/>

                <input type="button" id="add_more_org" class="upload" value="Plus de photos"/>
            </div>

        </div>

        <div class="row">

            <div class="col-xs-12 col-md-12 col-lg-3 ">
                <h4>Photo représentative</h4>
                <div id="filediv_rep"><input required accept="image/*"
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

                <button type="submit" class="btn btn-success btn-lg btn3d"
                        id="valider" name="submit" value="valider">
                    <span class="glyphicon glyphicon-ok"></span> Valider
                </button>

                <button type="reset" class="btn3d btn btn-danger btn-lg">
                    <span class="glyphicon glyphicon-remove"></span> Annuler
                </button>

            </div>
        </div>

    </fieldset>
</form>


<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//var_dump($_SESSION);

$target_path = "images/";
$tab = array();


if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['submit'] == 'valider')) {
    $j = 0;
    global $target_path, $tab;
    $tab = array();

    for ($i = 0; $i < count($_FILES['file_couv']['name']); $i++) {

        $ext = explode('.', basename($_FILES['file_couv']['name'][$i]));
        $file_extension = end($ext);

        $newFileName = md5(uniqid()) . "." . $file_extension;
        $target_path = $target_path . $newFileName;
        $j++;

        if (($_FILES["file_couv"]["size"][$i] < 1000000)) {

            $tab[] = ["typePhoto" => 1, "fileName" => $newFileName];

            /* if (move_uploaded_file($_FILES['file_rep']['tmp_name'][$i], $target_path)) {
                echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {
                 echo $j . ').<span id="error">please try again!.</span><br/><br/>';
            }*/
        } else {
          //  echo $j . ').<span id="error">Le fichier ne doit pas dépasser 1MB </span><br/><br/>';
        }
    }

    for ($i = 0; $i < count($_FILES['file_spon']['name']); $i++){

        $ext = explode('.', basename($_FILES['file_spon']['name'][$i]));
        $file_extension = end($ext);

        $newFileName = md5(uniqid()) . "." . $file_extension;
        $target_path = $target_path . $newFileName;
        $j++;

        if (($_FILES["file_spon"]["size"][$i] < 1000000)) {

            $tab[] = ["typePhoto" => 3, "fileName" => $newFileName];

            /* if (move_uploaded_file($_FILES['file_rep']['tmp_name'][$i], $target_path)) {
                echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {
                 echo $j . ').<span id="error">please try again!.</span><br/><br/>';
            }*/
        } else {
            //  echo $j . ').<span id="error">Le fichier ne doit pas dépasser 1MB </span><br/><br/>';
        }
    }

    for ($i = 0; $i < count($_FILES['file_autr']['name']); $i++){

        $ext = explode('.', basename($_FILES['file_autr']['name'][$i]));
        $file_extension = end($ext);

        $newFileName = md5(uniqid()) . "." . $file_extension;
        $target_path = $target_path . $newFileName;
        $j++;

        if (($_FILES["file_autr"]["size"][$i] < 1000000)) {

            $tab[] = ["typePhoto" => 4, "fileName" => $newFileName];

            /* if (move_uploaded_file($_FILES['file_rep']['tmp_name'][$i], $target_path)) {
                 echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
             } else {
                  echo $j . ').<span id="error">please try again!.</span><br/><br/>';
             }*/
        } else {
            //  echo $j . ').<span id="error">Le fichier ne doit pas dépasser 1MB </span><br/><br/>';
        }
    }

    for ($i = 0; $i < count($_FILES['file_org']['name']); $i++){

        $ext = explode('.', basename($_FILES['file_org']['name'][$i]));
        $file_extension = end($ext);

        $newFileName = md5(uniqid()) . "." . $file_extension;
        $target_path = $target_path . $newFileName;
        $j++;

        if (($_FILES["file_org"]["size"][$i] < 1000000)) {

            $tab[] = ["typePhoto" => 2, "fileName" => $newFileName];

            /* if (move_uploaded_file($_FILES['file_rep']['tmp_name'][$i], $target_path)) {
                echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {
                 echo $j . ').<span id="error">please try again!.</span><br/><br/>';
            }*/
        } else {
            //  echo $j . ').<span id="error">Le fichier ne doit pas dépasser 1MB </span><br/><br/>';
        }
    }

    for ($i = 0; $i < count($_FILES['file_rep']['name']); $i++){

        $ext = explode('.', basename($_FILES['file_rep']['name'][$i]));
        $file_extension = end($ext);

        $newFileName = md5(uniqid()) . "." . $file_extension;
        $target_path = $target_path . $newFileName;
        $j++;

        if (($_FILES["file_rep"]["size"][$i] < 1000000)) {

            $tab[] = ["typePhoto" => 5, "fileName" => $newFileName];

           /* if (move_uploaded_file($_FILES['file_rep']['tmp_name'][$i], $target_path)) {
                echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {
                 echo $j . ').<span id="error">please try again!.</span><br/><br/>';
            }*/
        } else {
            //  echo $j . ').<span id="error">Le fichier ne doit pas dépasser 1MB </span><br/><br/>';
        }
    }


    $pdo = Connection::getConnexion();
    $evenement = new Evenement($_SESSION['nomEve'], $_SESSION['lieuEve'], $_SESSION['dateMiseEnLigneEve'], $_SESSION['datedebutEve'],
        $_SESSION['datefinEve'], $_SESSION['contactEve'], $_SESSION['prixEve'], $_SESSION['descriptionEve'], $_SESSION['iduser'],
        $_SESSION['typeEve']);

    $evenementManager = new EvenementManager($pdo);
    $photoManager = new PhotosManager($pdo);

    $evenementManager->createEvenement($evenement, $tab);


}
?>


</body>
</html>
