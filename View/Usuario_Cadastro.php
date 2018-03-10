<!doctype html>
<?php 
 require '../Model/connect.php';

?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Seridó Eventos- Adm</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <script>
            function validarSenha() {
                NovaSenha = document.FormSenha.senha.value;
                CNovaSenha = document.FormSenha.C_senha.value;
                if (NovaSenha != CNovaSenha) {
                    alert("Senhas diferentes!\ \n Favor digitar senhas iguais");
                    return false;
                }
                return true;
            }

            function confirmar() {
                // só permitirá o envio se o usuário responder OK
                var resposta = window.confirm("Deseja mesmo" +
                        " excluir este registro?");
                if (resposta)
                    return true;
                else
                    return false;
            }
        </script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
				<a href="" class="simple-text">
					Seridó Eventos
                </a>
            </div>

       
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <div class="navbar-brand">Painel de Controle Seridó Eventos - 
                    <?php 
                        if(isset($_SESSION['Usu_nome'])){
                            echo ' Bem vindo(a) <b>'.$_SESSION['Usu_nome'].' :D</b>';;
                        }
                    ?>
                    </div>
                </div>
                  
                
            </div>
        </nav>
		


        <?php
            require_once '../Controller/UsuarioController.php';
            if (isset($_POST["cadastrar"])) {
                $objControl = new UsuarioController();
                $objControl->CadastrarUsuario($_POST["nome"], $_POST["email"], $_POST["instit"], $_POST["senha"], $_POST["C_senha"]);
            }
        ?> 
        <br />
        <form method="post" action="" id="FormSenha" name="FormSenha" onsubmit="return validarSenha();">
            <div class="input-group">
                <span class="input-group-addon">Nome</span>
            </div>
            <input type="text" class="form-control" placeholder="Nome" name="nome" required="required"/><br/>


            <div class="input-group">
                <span class="input-group-addon">E-mail</span>
            </div>
            <input type="email" class="form-control" placeholder="E-mail" name="email" required="required"/><br/>


            <div class="input-group">
                <span class="input-group-addon">Instituição</span>
            </div>
            <select name="instit" class="form-control">
                <option value="UFRN" selected="selected">UFRN</option>
                <option value="UERN">UERN</option>
                <option value="IFRN">IFRN</option>
                <option value="FCST">FCST</option>
            </select><br/>

            <div class="input-group">
                <span class="input-group-addon">Senha</span>
            </div>
            <input type="password" class="form-control" placeholder="Senha" name="senha" required="required"/><br/>


            <div class="input-group">
                <span class="input-group-addon">Confirmar senha</span>
            </div>
            <input type="password" class="form-control" placeholder="Confirmar senha" name="C_senha" required="required"/><br/>

            <input type="submit" class="btn btn-success" name="cadastrar" value="Cadastrar"> 
        </form>   

   <?php include ("rodape.php") ?>
