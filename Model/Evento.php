<?php
     require_once '../Model/connect.php';

function cadastrarEvento($titulo, $curso, $link, $inicio, $fim,$local,$descricao,$cor,$id_usuario) {
    $conn = F_conect();
    $sql = "INSERT INTO evento(titulo, descricao, link_inscricao,local_evento,curso,cor,inicio_evento,fim_evento,id_usuario)
            VALUES('" . $titulo . "','" . $descricao . "','" . $link . "','" . $local . "','".$curso."','".$cor."','".$inicio."','".$fim."','".$id_usuario."')";
    if ($conn->query($sql) == TRUE) {
        Alert("Oba!", "Evento cadastrado com sucesso <br/> <a href='Evento_listar.php'> Listar seus Eventos</a>", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function listarEventos($usuario) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from evento WHERE id_usuario ='".$usuario."'");
    
    $i = 0;
    $eventos = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {
            $eventos[$i]['id'] = $row['id'];

            $eventos[$i]['titulo'] = $row['titulo'];
            $eventos[$i]['descricao'] = $row['descricao'];
            $eventos[$i]['local_evento'] = $row['local_evento'];
            $eventos[$i]['curso'] = $row['curso'];
            $eventos[$i]['inicio_evento'] = $row['inicio_evento'];
            $eventos[$i]['fim_evento'] = $row['fim_evento'];
            $eventos[$i]['link_inscricao'] = $row['link_inscricao'];

            $i++;
        }
    }
    $conn->close();
    return $eventos;
}

function RecuperarEvento($id) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from evento WHERE id =".$id);
    
    $i = 0;
    $eventos = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {

            $eventos[$i]['titulo'] = $row['titulo'];
            $eventos[$i]['descricao'] = $row['descricao'];
            $eventos[$i]['local_evento'] = $row['local_evento'];
            $eventos[$i]['curso'] = $row['curso'];
            $eventos[$i]['inicio_evento'] = $row['inicio_evento'];
            $eventos[$i]['fim_evento'] = $row['fim_evento'];
            $eventos[$i]['link_inscricao'] = $row['link_inscricao'];
            $i++;
        }
    }
    $conn->close();
    return $eventos;
}

function atualizarEvento($titulo, $curso, $link, $inicio, $fim,$local,$descricao,$cor,$id) {
    $conn = F_conect();
    $sql = " UPDATE evento SET  titulo='" . $titulo . "', curso='" . $curso . " ', link_inscricao='" .
            $link . "', inicio_evento='" . $inicio . " ', fim_evento='".$fim."', local_evento='".$local."', cor='".$cor."'  WHERE id = " . $id;

    if ($conn->query($sql) === TRUE) {
        Alert("Oba!", "Dados atualizados com sucesso", "success");
        echo "<a href='Evento_listar.php'> Voltar a lista de seus eventos</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluir_Evento($id) {

    $conn = F_conect();

    $sql = "DELETE FROM evento WHERE id = ".$id."";

    $conn->query($sql);

    $conn->close();
    	echo "<script language='javascript' type='text/javascript'>"
        . "alert('Evento excluído com sucesso!');";

            echo "</script>";
        echo "<script language='javascript' type='text/javascript'>
window.location.href = 'javascript:window.history.go(-1);';
</script>";
    
}
