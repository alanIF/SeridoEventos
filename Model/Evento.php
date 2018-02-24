<?php
     require_once '../Model/connect.php';

function cadastrarEvento($titulo, $curso, $link, $inicio, $fim,$local,$descricao,$cor,$id_usuario, $rua,$numero,$bairro,$cidade,$uf) {
    $conn = F_conect();
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.urlencode($rua).'+'.urlencode($numero).'+'.urlencode($bairro).'+'.urlencode($cidade).'+'.($uf).'&sensor=false');
    $output= json_decode($geocode);
    $lat= @$output->results[0]->geometry->location->lat;
    $long = @$output->results[0]->geometry->location->lng;
    if(isset($lat) AND isset($long)){
        //CADASTRO EVENTO
        $sql = "INSERT INTO evento(titulo, descricao, link_inscricao,local_evento,curso,cor,bairro,cidade,inicio_evento,fim_evento,id_usuario)
                VALUES('" . $titulo . "','" . $descricao . "','" . $link . "','" . $local . "','".$curso."','".$cor."','".$bairro."','".$cidade."','".$inicio."','".$fim."','".$id_usuario."')";
        if ($conn->query($sql) == TRUE) {
            Alert("Oba!", "Evento cadastrado com sucesso <br/> <a href='Evento_listar.php'> Listar seus Eventos</a>", "success");
            $last = $conn->insert_id;
            //SE DEU CERTO ... CADASTRAR LOCAL 
            $sql2 ='INSERT INTO markers (id, name, address, lat, lng, type) VALUES('.$last.',"'.$titulo.'","'.$rua.'-'.$numero.'",'.$lat.','.$long.',"'.$local.'")';
            if($conn->query($sql2) == TRUE){
                 Alert("Oba!", "Evendo cadastrado no Google Maps!", "success");
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        }else{
            Alert("Ops!", "Google Maps não encontrou este endereço, por favor verifique e tente novamente!", "danger");
	}       
            $conn->close();            
}

function listarEventosGeral() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from evento ");
    
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
            $eventos[$i]['bairro'] = $row['bairro'];
            $eventos[$i]['cidade'] = $row['cidade'];
            $i++;
        }
    }
    $conn->close();
    return $eventos;
}
function RecuperarEventoLocal($id) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from markers WHERE id =".$id);
    
    $i = 0;
    $eventos = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {

            $eventos[$i]['address'] = $row['address'];
            
            $i++;
        }
    }
    $conn->close();
    return $eventos;
}
function atualizarEvento($titulo, $curso, $link, $inicio, $fim,$local,$descricao,$cor,$id,$rua,$numero,$bairro,$cidade,$uf) {
    $conn = F_conect();
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.urlencode($rua).'+'.urlencode($numero).'+'.urlencode($bairro).'+'.urlencode($cidade).'+'.($uf).'&sensor=false');
    $output= json_decode($geocode);
    $lat= @$output->results[0]->geometry->location->lat;
    $long = @$output->results[0]->geometry->location->lng;
    
  if(isset($lat) AND isset($long)){
        //Atualizar EVENTO
        $sql = " UPDATE evento SET  titulo='" . $titulo . "', curso='" . $curso . " ', link_inscricao='" .
            $link . "', inicio_evento='" . $inicio . " ', fim_evento='".$fim."', local_evento='".$local."', cor='".$cor."', bairro='".$bairro."', cidade='".$cidade."', descricao='".$descricao."'  WHERE id = " . $id;
        if ($conn->query($sql) == TRUE) {
            Alert("Oba!", "Evento atualizado com sucesso <br/> <a href='Evento_listar.php'> Listar seus Eventos</a>", "success");
            $last = $id;
            //SE DEU CERTO ... Atualizar LOCAL  
        $sql2= "update markers set name='".$titulo."',address='".$rua."-".$numero."',lat='".$lat."',lng='".$long."',type='".$local."' where id=".$id;
            if($conn->query($sql2) == TRUE){
                 Alert("Oba!", "Evendo Atualizado no Google Maps!", "success");
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        }else{
            Alert("Ops!", "Google Maps não encontrou este endereço, por favor verifique e tente novamente!", "danger");
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
