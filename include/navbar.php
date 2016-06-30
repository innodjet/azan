

<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=".">Azan loo</a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">

                <li class="active"><a href="#">Acceuil</a></li>
                <li class="dropdown">
                    <a href="#"  data-toggle="dropdown">Compte <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Modifier profil</a></li>
                        <li><a href="#">Modifier mot de passe</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Supprimer</a></li>
                    </ul>
                </li>

                <li ><a href="#">Message</a></li>

                <li class="dropdown">
                    <a href="#" " data-toggle="dropdown">Evenement <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="nvoeve.php">Publier</a></li>
                        <li><a href="#">Participer</a></li>
                        <li><a href="searcheve.php">Recherche</a></li>
                        <li><a href="#">A venir</a></li>
                    </ul>
                </li>
            </ul>


            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    Connexion via
                                    <div class="social-buttons">
                                        <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                        <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                    </div>
                                    ou
                                    <form class="form" role="form" method="post" action="login" accept-charset="UTF-8"
                                          id="login-nav">
                                        <div class="form-group">
                                            <label class="sr-only" for="login">Email address</label>
                                            <input type="text" class="form-control" id="login"
                                                   placeholder="Adresse Email / Pseudo" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="password">Password</label>
                                            <input type="password" class="form-control" id="password"
                                                   placeholder="Mot de passe" required>
                                            <div class="help-block text-right"><a href="">Mot de passe oublié?</a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Se souvenir de moi
                                            </label>
                                        </div>
                                    </form>
                                </div>
                                <div class="bottom text-center">
                                    <a href="inscription.php"><b>Inscription</b></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>Deconnexion</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>