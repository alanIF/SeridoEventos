<?php
require_once 'topo.phtml';
?>
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Usuários</h4>
            <p class="category">Aqui estão todos os usuários do sistema. </p>
        </div>
        <table class="table table-striped">
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
            if ($tamanho > 0) {
                for ($i = 0; $i < $tamanho; $i++) {
                    echo"<tr><td>" . $vetor[$i]['NOME'] . "</td>";
                    echo"<td>" . $vetor[$i]['EMAIL'] . "</td>";
                    echo"<td><a href=Usuario_editar.php?id=" . $vetor[$i]['ID_USU'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                                <a onclick='return confirmar();' href=Usuario_excluir.php?id=" . $vetor[$i]['ID_USU'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
                }
            }
            ?>
        </table>

    </div>
</div>
<?php require_once 'rodape.html'; ?>