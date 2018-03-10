<?php
include ("topo.phtml");
?>

 <div class="row">
                                        
                                       <ul class="nav nav-tabs">
  
     <?php
     $conn = F_conect();
    $result = mysqli_query($conn, "Select * from evento where id_usuario='".$_SESSION['Usu_id']."'");
    
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
                    $tamanho =$i;
                    $numero_paginacao=(int)($tamanho / 3);
                    if ($numero_paginacao > 0) {
                        for ($i = 0; $i <= $numero_paginacao; $i++) {
                           $pagina=$i+1;
                           echo "<li><a data-toggle='tab' href='#".$pagina."' id='paginacao' > ".$pagina."</a></li>";
                        }
                    }else{
                          echo " <li class='active'><a data-toggle='tab' href='#1'  id='paginacao'>Página 1</a></li>";

                        
                    }
                    ?>
  
 
  </ul>

  <div class="tab-content">
      
        <br/>
        <?php
            $next_tab=1;
            $contador=0;
          for ($i = 0; $i < $tamanho; $i++) {
              if($i==0){
                  echo "<div id='".$next_tab."' class='tab-pane fade in active'>";
                  $contador=0;
              }
              if($contador>2){
                  $next_tab=$next_tab+1;
                  echo "</div>";
                  echo "<div id='".$next_tab."' class='tab-pane fade'>";
                  $contador=0;
              }
              echo '<div class="col-md-4"><div class="card card-member"><div class="content"><div class="description">';
              echo "<h3 class='title'>".$eventos[$i]['titulo']."</h3>";
              echo "<p class='description'>".$eventos[$i]['descricao']."</p>";
              echo "<p class='description'>Local Evento: ".$eventos[$i]['local_evento']."</p>";
              echo "<p class='description'>Curso: ".$eventos[$i]['curso']."</p>";
               echo "<p class='description'>Inicio do Evento: ".$eventos[$i]['inicio_evento']."</p>";
               echo "<p class='description'><a href='http://".$eventos[$i]['link_inscricao']."'  target='window'>Link para Inscrição</a></p></div></div></div></div>";


                      $contador=$contador+1;   

                            
           }
           
               echo "</div>";
           
        ?>
    
  
  </div>


</div>

                       


<?php include ("rodape.php")?>