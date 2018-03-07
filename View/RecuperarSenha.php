<?php
if (isset($_POST['salvar']) && isset($_POST['email'])) {
    $email = $_POST['email'];
    require_once '../Model/connect.php';
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from usuario where email='" . $email . "'");
    if (mysqli_num_rows($result) >= 1) {
        while ($row = $result->fetch_assoc()) {
            $SENHA = $row['senha'];
        }
         if (!empty($SENHA)) {
        require '../Mailer/class.phpmailer.php';
        require '../Mailer/class.smtp.php';
//RECEBENDO OS DADOS
//MENSSAGEM
        $body = '<div>
           <h4>Você solicitou a senha de acesso para o sistema Seridó Eventos Universitários, caso não tenha realizado essa ação ignore o email.</h4>
           Sua senha de acesso é "<b>' . $SENHA . '</b>"
               Att: Sistema Seridó Eventos
        </div>';


//CONFIGURAÇÕES DE E-MAIL

        $mail = new PHPMailer();
        $mail->setLanguage('pt');


        $host = 'smtp.gmail.com'; //EX: smtp.meusite.com.br
        $username = '4tetofantasticoBSI@gmail.com'; //EX:usuario@meusite.com >>>(Hostnet usa = no ludar de @)
        $passoword = 'BSIvaidarcerto'; //senha do email
        $port = 587; //587
        $secure = 'tls'; // a segurança depende da hospedagem, tem que ver que a sua.

        $from = $username;
        $fromnome = "Seridó Eventos Universitários";

        $mail->isSMTP();
        $mail->Host = $host;
        $mail->SMTPAuth = true;
        $mail->Username = $username;
        $mail->Password = $passoword;
        $mail->Port = $port;
        $mail->SMTPSecure = $secure;


        $mail->From = $from;
        $mail->FromName = $fromnome;
        $mail->addReplyTo($from, $fromnome);
        $mail->AddCC($email, "Cliente 4teto"); //Cópia exata para o cliente(PODE SER TIRADO)
        //$mail->addAddress('janailton.ifrn@hotmail.com', 'Janailton'); //dados de quem recebe
        $mail->isHTML(true);
        $mail->CharSet = 'utf-8';
        $mail->WordWrap = 70;

        $mail->Subject = 'Seridó Eventos Universitários - Recuperar Senha';
        $mail->Body = $body; //Email com HTML
        $mail->AltBody = 'Erro na interpretação HTML';  // Email sem HTML (por segurança)
//$mail ->addAttachment($arquivo['tmp_name'], $arquivo['name']);

        if ($mail->send()) {
             Alert("Oba!", "Um E-mail foi enviado, verifique sua caixa de entrada", "success");
        } else {
            Alert("Ops!", "E-mail não encontrado, verifique e tente novamente!", "danger");
        }
    }
        
    }else{
        Alert("Ops!", "E-mail não encontrado, verifique e tente novamente!", "danger");
    }
   
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/icon.png">
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
                <h3 class="omb_authTitle">Digite o e-mail de acesso e enviaremos sua senha para você!</h3>
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
                                <input type="email" name="email" class="form-control"   placeholder="E-mail" required autofocus>
                            </div>
                            <span class="help-block"> </span>
                            <button type="submit" name="salvar" class="btn btn-lg btn-primary btn-block">Solicitar</button>
                        </form>
                    </div>
                </div>
                <div class="row omb_row-sm-offset-3">

                    <div class="col-xs-12 col-sm-4">
                        <p class="omb_forgotPwd" style="margin-right: 15%;">
                            <a href="./Login.php">Voltar</a>
                        </p>
                    </div>
                </div>	    	
            </div>



        </div>
    </body>
</html>