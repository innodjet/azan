<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Inscription</title>

    <?php include 'include/headerfile.php'?>

    <link rel="stylesheet" href="css/inscription.css" />
    <script src="js/inscription.js" type="text/javascript"></script>

</head>
<body>

<?php include 'include/navbar.php'?>

<div class="box " >
    <fieldset >
        <legend id="text">Inscription</legend>

        <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>"
              autocomplete="off" method="post" >


            <div class="row">
                <div class="col-xs-12 col-md-8 col-lg-8">
                    <input id="idpseudo" onblur="check('pseudo', 'idpseudo', 'messageCheckPseudo', 'checkPseudo',
                    'Pseudo disponible', 'Pseudo déja utilisé' )" required
                           value="<?php echo $_POST['pseudo'];?>"
                           class="form-control" name="pseudo" placeholder="Pseudo" type="text"   />
                    <p  id="messageCheckPseudo" ><?php if($exists){ echo $exists['pseudoexist']; } ?></p>
                </div>

                <div class="col-xs-12 col-md-4 col-lg-4 form-inline ">
                    <label class="radio-inline" >
                        <input type="radio" name="sexe"  value="M" checked="checked">M
                    </label>
                    <label class="radio-inline" for="radios-1">
                        <input type="radio" name="sexe"  value="F">F
                    </label>
                </div>

            </div>



            <div class="input-group">
                <span class="input-group-addon">@</span>
                <input onblur="checkmail('email', 'idEmail', 'messageCheckEmail', 'checkMail',
             'Adresse email disponible', 'Adresse email déja utilisé' )"  type="email" id="idEmail"
                       value="<?php echo $_POST['email'] ?>" required
                       class="form-control" name="email" placeholder="Adresse Email"   />
            </div>
            <p id="messageCheckEmail" ><?php if($exists){ echo $exists['emailexist']; } ?></p>


            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input class="form-control" onblur="verifSaisie('pwd', 'pwd2', 'messageCheckPassword')"
                       autocomplete="off" required name="password" id="pwd" placeholder="Mot de passe" type="password" />
            </div>
            <p></p>

            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input class="form-control" onblur="verifSaisie('pwd', 'pwd2', 'messageCheckPassword')"
                       autocomplete="off" required name="password2" id="pwd2" placeholder="Verification du mot de passe" type="password" />
            </div>
            <p id="messageCheckPassword" ></p>

            <div class="row">
                <div class="col-xs-12 col-md-8 col-lg-8">
                    <button name="inscription" value="submit" class="btn btn-lg btn-primary btn-block" type="submit">
                        <span class="glyphicon glyphicon-floppy-save"></span> Inscription </button>
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

