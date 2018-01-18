<?php
include ("topo.phtml");

require_once '../Controller/EventoController.php';
   if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $objProva = new EventoController();
        $vet = $objProva->RecuperarEvento($id);+
        
        $titulo= $vet[0]['titulo'] ;
        $descricao=$vet[0]['descricao']; 
        $local_evento=$vet[0]['local_evento'] ;
        $link=$vet[0]['link_inscricao']; 
        $curso=$vet[0]['curso'] ;
        $inicio_evento=$vet[0]['inicio_evento']; 
        $fim_evento=$vet[0]['fim_evento'] ;
    } else {
        echo "<script language= 'JavaScript'>
                                            location.href='erro.php'
                                    </script>";
    }
if (isset($_POST["atualizar"])) {
    $objControl = new EventoController();


    date('Y-m-d H:i:s', strtotime($_POST['inicio']));

    $objControl->AtualizarEvento($_POST["titulo"], $_POST["curso"], $_POST["link"], $_POST["inicio"], $_POST["fim"], $_POST["local"], $_POST["descricao"], $_POST["cor"], $id);
}
?> 

<form method="post" action="">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" class="form-control border-input" name="titulo" placeholder="Titulo do Evento" required="" value="<?php echo $titulo;?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Curso</label>
                <input type="text" class="form-control border-input" placeholder="curso" name="curso" required="" value="<?php echo $curso;?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Link para Inscrição</label>
                <input type="text" class="form-control border-input" name="link" placeholder="Link para Inscricão" value="<?php echo $link;?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Inicio do Evento</label>
                <input type="datetime-local" class="form-control border-input" placeholder="Inicio do Evento" name="inicio" required="" value="<?php echo $inicio_evento;?>">
            </div>


        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Fim do Evento</label>
                <input type="datetime-local"  class="form-control border-input" placeholder="Fim do Evento" name="fim" required="" value="<?php echo $fim_evento;?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Local do Evento</label>
                <input type="text" class="form-control border-input" placeholder="Local do Evento" name="local" required="" value="<?php echo $local_evento;?>">
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Descrição do Evento</label>
                <textarea rows="5" class="form-control border-input" placeholder="Descrição do Evento" name="descricao"><?php echo $descricao; ?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="example-color-input" class="col-2 col-form-label">Cor</label>

                <input type="color" name="cor" placeholder="Escolha a cor do Evento">
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-info btn-fill btn-wd" name="atualizar">Atualizar Evento</button>
    </div>
    <div class="clearfix"></div>
</form>


<?php include ("rodape.html") ?>