<?php
$titulo1 = 'Listar usuários';
$titulo2 = 'Lista de usuários';
require_once './Topo.phtml';
?>
        <div class="col-md-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                require '../Controller/UsuarioController.php';
                    $obj = new UsuarioController();
                   $vetor = $obj->ListarProfessores();
                ?>
            </tbody>
            <?php
            $tamanho = count($vetor);
            if($tamanho > 0){
                for($i =0; $i<$tamanho; $i++){
                    echo"<tr><td>" . $vetor[$i]['NOME']  . "</td>";
                    echo"<td>" .     $vetor[$i]['EMAIL'] . "</td>";
                    echo"<td><a href=Usuario_editar.php?id=" . $vetor[$i]['ID_USU'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                                <a onclick='return confirmar();' href=Usuario_excluir.php?id=" . $vetor[$i]['ID_USU'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
                }
            }    
            ?>
        </table>
    </div>
<?php require_once './Rodape.html'; ?>