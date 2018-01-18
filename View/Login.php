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


        <title> Seridó Eventos - Entrar </title>
        <!-- BOOTSTRAP STYLES-->
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />
        <!-- Login CSS -->
        <link href="../assets/css/loginInicio.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->


    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="account-wall">
                        <img src="../assets/img/Logo.png" width="250" height="250">
                        <div id="my-tab-content" class="tab-content">
                            <div class="tab-pane active" id="login">
                                <img class="img-rounded" src="../imagens/logo.png"
                                     alt="">
                                <form class="form-signin" action="" method="post">
                                    <input type="email" name="usuario" class="form-control"   placeholder="E-mail" required autofocus>

                                    <br>

                                    <input type="password" name="senha" class="form-control" placeholder="Senha" required>

                                    <br>
                                    <br>

                                    <input type="submit" name="logar" class="btn btn-lg btn-info btn-block" value="Entrar" />

                                    <a href="./Usuario_Cadastro.php"   class="btn btn-lg btn-info btn-block">Cadastrar</a>

                                </form>
                                 <!--<a class="col-sm-2 col-md-8 col-md-offset-2" href="#"><h4>Esquecei minha senha</h4></a>-->
                            </div>        
                          </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </body>
</html>