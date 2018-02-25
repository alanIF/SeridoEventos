<?php
include ("topo.phtml");
?>
<script type="text/javascript">
    function confirmar() {
        // só permitirá o envio se o usuário responder OK
        var resposta = window.confirm("Deseja mesmo" +
                " excluir este Evento?");
        if (resposta)
            return true;
        else
            return false;
    }
</script>
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Meus Eventos</h4>
            <p class="category">Aqui você consegue gerenciar seus eventos, cadastrar, editar, excluir. </p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                <th>Título</th>
                <th>Descricão</th>
                <th>Local do Evento</th>
                <th>Link de Inscrição</th>
                <th>Curso</th>
                <th>Data do inicio do Evento</th>
                <th>Data do fim do Evento</th>
                <th></th>

                </thead>
                <tbody>
                    <?php                    

                    
                    require '../Controller/EventoController.php';
                    $obj = new EventoController();
                    $vetor = $obj->ListarEventos($_SESSION['Usu_id']);
                    $tamanho = count($vetor);
                    if ($tamanho > 0) {
                        for ($i = 0; $i < $tamanho; $i++) {
                            if($vetor[$i]['status']==0){
                                echo "<tr class=''>";
                            }else{
                                 echo "<tr class='success'>";

                            }
                            echo"<td>" . $vetor[$i]['titulo'] . "</td>";
                            echo"<td>" . $vetor[$i]['descricao'] . "</td>";
                            echo"<td>" . $vetor[$i]['local_evento'] . "</td>";
                            echo"<td>" . $vetor[$i]['link_inscricao'] . "</td>";
                            echo"<td>" . $vetor[$i]['curso'] . "</td>";
                            echo"<td>" . $vetor[$i]['inicio_evento'] . "</td>";
                            echo"<td>" . $vetor[$i]['fim_evento'] . "</td>";

                            echo"<td><a href=Evento_editar.php?id=" . $vetor[$i]['id'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                                                                <a onclick='return confirmar();' href=Evento_excluir.php?id=" . $vetor[$i]['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
                        }
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th> <a href="Evento_cadastrar.php"><i class="fa fa-plus-square" aria-hidden="true"></i></a></th>
                        <td></td>                                        <td></td>
                        <td></td>  <td></td>  <td></td>  <td></td>  <td></td> 
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>

<?php include ("rodape.html") ?>