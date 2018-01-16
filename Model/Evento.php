<?php
     require_once '../Model/connect.php';

function cadastrarEvento($titulo, $curso, $link, $inicio, $fim,$local,$descricao,$cor,$id_usuario) {
    $conn = F_conect();
    $sql = "INSERT INTO evento(titulo, descricao, link_inscricao,local_evento,curso,cor,inicio_evento,fim_evento)
            VALUES('" . $titulo . "','" . $descricao . "','" . $link . "','" . $local . "','".$curso."','".$cor."','".$inicio."','".$fim."')";
    if ($conn->query($sql) == TRUE) {
        Alert("Oba!", "Evento cadastrado com sucesso <br/> <a href='Evento_listar.php'> Listar seus Eventos</a>", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function listarUsuarios() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from usuario WHERE nivel = 1");
    
    $i = 0;
    $users = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {
            $users[$i]['NOME'] = $row['nome'];
            $users[$i]['EMAIL'] = $row['email'];
            $users[$i]['ID_USU'] = $row['idAdmin'];
            $i++;
        }
    }
    $conn->close();
    return $users;
}

function RecuperarUsuarios($id) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from usuario WHERE idAdmin =".$id);
    
    $i = 0;
    $users = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {
            $users[$i]['NOME'] = $row['nome'];
            $users[$i]['EMAIL'] = $row['email'];
            $users[$i]['SENHA'] = $row['senha'];
            $i++;
        }
    }
    $conn->close();
    return $users;
}

function editarProfessor($nome, $email, $nivel, $senha, $id) {
    $conn = F_conect();
    $sql = " UPDATE usuario SET  nome='" . $nome . "', email='" . $email . " ', nivel='" .
            $nivel . "', senha='" . $senha . " ' WHERE idAdmin = " . $id;

    if ($conn->query($sql) === TRUE) {
        Alert("Oba!", "Dados atualizados com sucesso", "success");
        echo "<a href='Usuario_listar.php'> Voltar a lista professores</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluir($id) {

    $conn = F_conect();

    $sql = "DELETE FROM usuario WHERE idAdmin = ".$id." AND nivel = 1";

    $conn->query($sql);

    $conn->close();
    
}
