<?php
function cadastrar($nome, $email, $instituicao, $senha) {
    $conn = F_conect();
    $sql = "INSERT INTO usuario(nome, email, instituicao,senha)
            VALUES('" . $nome . "','" . $email . "','" . $instituicao . "','" . $senha . "')";
    if ($conn->query($sql) == TRUE) {
        Alert("Oba!", "Usuário cadastrado com sucesso <br/> <a href='Usuario_listar.php'> Voltar ao menu</a>", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function listarUsuarios() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from usuario");
    $i = 0;
    $users = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {
            $users[$i]['NOME'] = $row['nome'];
            $users[$i]['EMAIL'] = $row['email'];
            $users[$i]['VALIDACAO'] = $row['validacao'];
            $users[$i]['ADMIN'] = $row['isAdmin'];

            $users[$i]['ID_USU'] = $row['id'];
            $i++;
        }
    }
    $conn->close();
    return $users;
}

function RecuperarUsuarios_Editar($id) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from usuario WHERE id=".$id);
    
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

function editarUsuario($nome, $email, $instituicao,$validacao,$tipo, $id) {
    $conn = F_conect();
    $sql = " UPDATE usuario SET  nome='" . $nome . "', email='" . $email . " ', instituicao='" .
            $instituicao . "',validacao='".$validacao."', isAdmin='".$tipo."' WHERE id= " . $id;

    if ($conn->query($sql) === TRUE) {
        Alert("Oba!", "Dados atualizados com sucesso", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function editarPerfil ($nome, $email, $inst, $senha, $id){
     $conn = F_conect();
     $sql = " UPDATE usuario SET  nome='" . $nome . "', email='" . $email . " ', instituicao='" .
            $inst . "',senha='".$senha."' WHERE id= " . $id;
     if ($conn->query($sql) === TRUE) {
        Alert("Oba!", "Dados atualizados com sucesso", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluir_Usuario($id) {

    $conn = F_conect();

    $sql = "DELETE FROM usuario WHERE id = ".$id;

    $conn->query($sql);

    $conn->close();
    
}
