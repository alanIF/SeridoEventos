    <?php
    $titulo1 = 'Cadastro de usuário';
    $titulo2 = 'Cadastro de usuário';
    require_once './Topo.phtml';
    ?>


    <div class="col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8 " >
        <?php
            require_once '../Controller/UsuarioController.php';
            if (isset($_POST["cadastrar"])) {
                $objControl = new UsuarioController();
                $objControl->CadastrarUsuario($_POST["nome"], $_POST["email"], $_POST["nivel"], $_POST["senha"], $_POST["C_senha"]);
            }
        ?> 
        <br />
        <form method="post" action="" id="FormSenha" name="FormSenha" onsubmit="return validarSenha();">
            <div class="input-group">
                <span class="input-group-addon">Nome</span>
            </div>
            <input type="text" class="form-control" placeholder="Nome" name="nome" required="required"/><br/>


            <div class="input-group">
                <span class="input-group-addon">E-mail</span>
            </div>
            <input type="email" class="form-control" placeholder="E-mail" name="email" required="required"/><br/>


            <div class="input-group">
                <span class="input-group-addon">Nível de usuário</span>
            </div>
            <select name="nivel" class="form-control">
                <option value="1" selected="selected">Professor</option>
                <option value="2">Cordenador</option>
            </select><br/>

            <div class="input-group">
                <span class="input-group-addon">Senha</span>
            </div>
            <input type="password" class="form-control" placeholder="Senha" name="senha" required="required"/><br/>


            <div class="input-group">
                <span class="input-group-addon">Confirmar senha</span>
            </div>
            <input type="password" class="form-control" placeholder="Confirmar senha" name="C_senha" required="required"/><br/>

            <input type="submit" class="btn btn-success" name="cadastrar" value="Cadastrar"> 
        </form>           
    </div>

    <?php require_once './Rodape.html'; ?>
