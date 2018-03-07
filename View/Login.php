<?php
if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    require '../Controller/ConnectController.php';

    $usuario = htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'UTF-8');
    $senha = htmlspecialchars($_POST['senha'], ENT_QUOTES, 'UTF-8');

    $login = new ConnectController();
    $login->RealizarLogin($usuario, $senha);
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/icon.png">
        <link href="./assets/css/login.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link href="./assets/css/login.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">


            <div class="omb_login">
                <img src="../assets/img/Logo.png">
                <h3 class="omb_authTitle">Primeira vez por aqui? <a href="./Usuario_Cadastro.php">Cadastrar-se</a></h3>
                <div class="row omb_row-sm-offset-3 omb_socialButtons">

                </div>

                <div class="row omb_row-sm-offset-3 omb_loginOr">
                    <div class="col-xs-12 col-sm-6">
                        <hr class="omb_hrOr">
                        <span class="omb_spanOr"></span>
                    </div>
                </div>

                <div class="row omb_row-sm-offset-3">
                    <div class="col-xs-12 col-sm-6">	
                        <form class="omb_loginForm" action="" autocomplete="off" method="POST">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="email" name="usuario" class="form-control"   placeholder="E-mail" required autofocus>
                            </div>
                            <span class="help-block"></span>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                            </div>
                            <span class="help-block"> </span>

                            <button type="submit" name="logar" class="btn btn-lg btn-primary btn-block">Entrar</button>
                        </form>
                    </div>
                </div>
                <div class="row omb_row-sm-offset-3">

                    <div class="col-xs-12 col-sm-4">
                        <p class="omb_forgotPwd">
                            <a href="RecuperarSenha.php">Esqueceu sua senha?</a>
                        </p>
                    </div>
                </div>	    	
            </div>



        </div>
    </body>
</html>