<?php

function F_conect() {
    $servidor = "localhost";
    $nomebanco = "seridoeventos";
    $usuario = "root";
    $senha = "";

    // Criando conexão com o Banco de Dados
    $conn = new mysqli($servidor, $usuario, $senha, $nomebanco);

    // Checando conexão erro
    if ($conn->connect_error) {
        //Caso verdadeiro, Mostra o Erro.
        die("Connection failed: " . $conn->connect_error);
    } else {
        // Caso falso, retorna a conexão
        return $conn;
    }
}

function Alert($titulo, $corpo, $tipo) {
    echo "<div class='alert alert-" . $tipo . " alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>" . $titulo . "</strong><BR/>" . $corpo . "</div>";
}

function logar($email, $senha) {
    $conn = F_conect();
    session_start();

    $result = mysqli_query($conn, "SELECT * FROM usuario WHERE email='" . $email . "' AND senha='" . $senha . "'");
    if (mysqli_num_rows($result) == 1) {
        // teste - certo

        while ($row = $result->fetch_assoc()) {
            $id_usuario = $row["id"];
            $nome_usuario = $row["nome"];
            $instituicao = $row["instituicao"];
        }
        //fim teste
        $_SESSION['Usu_email'] = $email;
        $_SESSION['Usu_nome'] = $nome_usuario;
        $_SESSION['Usu_id'] = $id_usuario;
        $_SESSION['Usu_inst'] = $instituicao;
        $_SESSION['ativo'] = true;

        header('Location: globo.com.br');
    } else if (mysqli_num_rows($result) != 1) {
        $_SESSION['usuario'] = false;
        $_SESSION['ativo'] = false;
        Alert("Ops!", "Email e senha não correspondem", "danger");
    }
}

function sair() {
    session_start();
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    header('Location: ../');
}

function testLogado(){
    session_start();
    if ($_SESSION['Usu_email'] == false) {
        header('Location: ../');
    }
}

