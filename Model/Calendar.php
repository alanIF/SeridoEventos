<?php
function allEventos() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from evento");
    
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
            $eventos[$i]['cor'] = $row['cor'];

            $i++;
        }
    }
    $conn->close();
    return $eventos;
}