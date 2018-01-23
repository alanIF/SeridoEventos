<?php
include ("topo.phtml");
?>
<?php
require_once '../Controller/EventoController.php';
if (isset($_POST["cadastrar"])) {
    $objControl = new EventoController();

    $id_usuario = $_SESSION['Usu_id'];

    date('Y-m-d H:i:s', strtotime($_POST['inicio']));

    $objControl->CadastrarEvento($_POST["titulo"], $_POST["curso"], $_POST["link"], $_POST["inicio"], $_POST["fim"], $_POST["local"], $_POST["descricao"], $_POST["cor"], $id_usuario,
            $_POST["rua"],$_POST["num"],$_POST["bairro"],$_POST["cidade"],$_POST["uf"]);
}
?> 

<form method="post" action="">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" class="form-control border-input" name="titulo" placeholder="Titulo do Evento" required="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Curso</label>
                <input type="text" class="form-control border-input" placeholder="curso" name="curso" required="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Link para Inscrição</label>
                <input type="text" class="form-control border-input" name="link" placeholder="Link para Inscricão">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Inicio do Evento</label>
                <input type="datetime-local" class="form-control border-input" placeholder="Inicio do Evento" name="inicio" required="">
            </div>


        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Fim do Evento</label>
                <input type="datetime-local"  class="form-control border-input" placeholder="Fim do Evento" name="fim" required="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Local do Evento</label>
                <input type="text" class="form-control border-input" placeholder="Local do Evento" name="local" required="">
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Descrição do Evento</label>
                <textarea rows="5" class="form-control border-input" placeholder="Descrição do Evento" name="descricao"></textarea>
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
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Rua</label>
                <input type="text" class="form-control border-input" placeholder="Rua" name="rua" required=""> 
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Cidade</label>
                <input type="text" class="form-control border-input" placeholder="Cidade" name="cidade" required=""> 
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Bairro</label>
                <input type="text" class="form-control border-input" placeholder="Bairro (Centro)" name="bairro" required=""> 
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Estado</label>
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
                <label>Número</label>
                <input type="text" class="form-control border-input" placeholder="N° prédio" name="num" required=""> 
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-info btn-fill btn-wd" name="cadastrar">Cadastrar Evento</button>
    </div>
    <div class="clearfix"></div>
</form>


<?php include ("rodape.html") ?>