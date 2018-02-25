<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Seridó Eventos Universitários - Recuperar Senha </title>
        <!-- BOOTSTRAP STYLES-->
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />
        <!-- Login CSS -->
        <link href="../assets/css/loginInicio.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    </head>

    <body>

        <div class="container ">
            <div class="row ">
                <div class="account-wall col-sm-6 col-md-8 col-md-offset-2">
                    <div  class="reclogo">
                    <img src="../assets/img/Logo.png" width="250" height="250">
                    </div>
                    <div id="my-tab-content" class="tab-content ">
                        <div class="tab-pane active " id="login">
                            <h2 class="col-lg-offset-2">Recuperar senha</h2>
                            <h4 class="col-lg-offset-2">Digite seu email e enviaremos a senha para você!</h4>
                            <form class="" action="" method="post">
                                <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">    
                                    <p>E-mail:</p>
                                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                                    <br>
                                </div>

                                <div class="col-lg-4 col-lg-offset-2">
                                    <input type="submit" name="salvar" class="btn btn-lg btn-danger btn-block" value="Solicitar" />
                                </div>

                                <div class="col-lg-4">  
                                    <a href="./Login.php"   class="btn btn-lg btn-info btn-block"  >Voltar</a>
                                </div>
                            </form>                                
                        </div>                           
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
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
}