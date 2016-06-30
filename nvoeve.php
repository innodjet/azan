<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Publier un évènement</title>

    <?php include 'include/headerfile.php' ?>


    <link rel="stylesheet" type="text/css" media="screen"
          href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">


    <style type="text/css" rel="stylesheet">
        #form {
            margin-top: 50px;
        }
    </style>

</head>
<body>


<?php include 'include/navbar.php' ?>


<form class="form-horizontal" id="form">
    <fieldset>

        <!-- Form Name -->
        <legend>Nouveau évènement (1/2)</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Nom</label>
            <div class="col-md-6">
                <input id="textinput" name="textinput" type="text" placeholder="Nom de l'évènement"
                       class="form-control input-md" required="">
                <span class="help-block">Ex: Avépozo Party</span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Lieu</label>
            <div class="col-md-6">
                <input id="textinput" name="textinput" type="text" placeholder="Lieu de l'évènement"
                       class="form-control input-md" required="">
                <span class="help-block">Avépozo Beach</span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Prix</label>
            <div class="col-md-4">
                <input id="textinput" name="textinput" type="text" placeholder="Prix de la party"
                       class="form-control input-md">
                <span class="help-block">25000</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Prix</label>

            <div id="datetimepicker" class="col-md-4 input-append date">
                <input type="text" />
      <span class="add-on glyphicon glyphicon-calendar">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar" ></i>
      </span>
            </div>
        </div>







        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Date début</label>
            <div class="col-md-4">
                <input id="textinput" name="textinput" type="text" placeholder="Prix de la party"
                       class="form-control input-md">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Date fin</label>
            <div class="col-md-4">
                <input id="textinput" name="textinput" type="text" placeholder="Prix de la party"
                       class="form-control input-md">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Contact</label>
            <div class="col-md-6">
                <input id="textinput" name="textinput" type="text" placeholder="Contact" class="form-control input-md">
                <span class="help-block">Tel: 00228 90 97 89 71</span>
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textarea">Description</label>
            <div class="col-md-4">
                <textarea class="form-control" id="textarea" name="textarea">Description...</textarea>
            </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="button1id"></label>
            <div class="col-md-8">
                <button id="button1id" name="button1id" class="btn btn-success">Valider</button>
                <button id="button2id" name="button2id" class="btn btn-danger" type="reset">
                    <span class="glyphicon glyphicon-remove"></span> Annuler
                </button>
            </div>
        </div>

    </fieldset>
</form>



<script src="https://code.jquery.com/jquery-1.12.2.min.js"
        integrity="sha256-lZFHibXzMHo3GGeehn1hudTAP3Sc0uKXBXAzHX1sjtk="
        crossorigin="anonymous"></script>
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
crossorigin="anonymous"></script>

<script type="text/javascript"
        src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
</script>
<script type="text/javascript"
        src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
</script>
<script type="text/javascript">
    $('#datetimepicker').datetimepicker({
        format: 'dd/MM/yyyy hh:mm:ss',
        language: 'pt-BR'
    });
</script>


</body>
</html>
