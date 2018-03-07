<?php
include ("topo.phtml");

require_once '../Controller/EventoController.php';
   if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $objProva = new EventoController();
        $vet = $objProva->RecuperarEvento($id);
        $vet2=$objProva->RecuperarEventoLocal($id);
        $titulo= $vet[0]['titulo'] ;
        $descricao=$vet[0]['descricao']; 
        $local_evento=$vet[0]['local_evento'] ;
        $link=$vet[0]['link_inscricao']; 
        $curso=$vet[0]['curso'] ;
        $D_ini = explode(' ', $vet[0]['inicio_evento'], 2); 
        $inicio_evento = $D_ini[0].'T'.$D_ini[1]; 
        $D_fim = explode(' ', $vet[0]['fim_evento'], 2); 
        $fim_evento= $D_fim[0].'T'.$D_fim[1];
        $bairro=$vet[0]['bairro'] ;
        $cidade=$vet[0]['cidade'] ;
        $local_evento2=$vet2[0]['address'];
        $partes = explode("-", $local_evento2);
    } else {
        echo "<script language= 'JavaScript'>
                                            location.href='erro.php'
                                    </script>";
    }
if (isset($_POST["atualizar"])) {
    $objControl = new EventoController();


    date('Y-m-d H:i:s', strtotime($_POST['inicio']));

    $objControl->AtualizarEvento($_POST["titulo"], $_POST["curso"], $_POST["link"], $_POST["inicio"], $_POST["fim"], $_POST["local"], $_POST["descricao"], $_POST["cor"], $id, $_POST["rua"],$_POST["num"],$_POST["bairro"],$_POST["cidade"],$_POST["uf"]);
}
?> 

<form method="post" action="">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>Titulo*</label>
                <input type="text" class="form-control border-input" name="titulo" placeholder="Titulo do Evento" required="" value="<?php echo $titulo;?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Curso</label>
                <input type="text" class="form-control border-input" placeholder="curso" name="curso" value="<?php echo $curso;?>">
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
                <label>Inicio do Evento*</label>
                <input type="datetime-local" class="form-control border-input"  name="inicio" required="" value="<?php echo $inicio_evento;?>">
            </div>


        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Fim do Evento*</label>
                <input type="datetime-local"  class="form-control border-input" name="fim" required="" value="<?php echo $fim_evento;?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Local do Evento*</label>
                <input type="text" class="form-control border-input" placeholder="Local do Evento" name="local" required="" value="<?php echo $local_evento;?>">
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Descrição do Evento*</label>
                <textarea rows="5" class="form-control border-input" placeholder="Descrição do Evento" name="descricao"><?php echo $descricao; ?></textarea>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Rua*</label>
                <input type="text" class="form-control border-input" placeholder="Rua" name="rua" required="" value="<?php echo $partes[0]; ?>"> 
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Cidade*</label>
                <input type="text" class="form-control border-input" placeholder="Cidade" name="cidade" value="<?php echo $cidade; ?>" required="" > 
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Bairro*</label>
                <input type="text" class="form-control border-input" placeholder="Bairro (Centro)" name="bairro" value="<?php echo $bairro; ?>" required=""> 
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Estado*</label>
                <select name="uf" class="form-control border-input">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN" selected="">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Número*</label>
                <input type="text" class="form-control border-input" placeholder="N° prédio" name="num" required="" value="<?php echo $partes[1]; ?>"> 
            </div>
        </div>
    </div>
   <div class="col-md-3">
            <div class="form-group">
                <label>Cor*</label>
                <select name="cor" class="form-control border-input">
                    <option value="#0000FF">Azul</option>
                    <option value="#FFFF00">Amarelo</option>
                    <option value="#008000">Verde</option>
                    <option value="#FF0000">Vermelho</option>
                    <option value="#000000">Preto</option>
                    <option value="#FFFFFF">Branco</option>
                   
                </select>
            </div>
        </div>
    <div class="text-center">
        <button type="submit" class="btn btn-info btn-fill btn-wd" name="atualizar">Atualizar Evento</button>
    </div>
    <div class="clearfix"></div>
</form>


<?php include ("rodape.html") ?>