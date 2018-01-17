<?php
include ("topo.phtml");
?>


        <?php
            require_once '../Controller/UsuarioController.php';
            if (isset($_POST["cadastrar"])) {
                $objControl = new UsuarioController();
                $objControl->CadastrarUsuario($_POST["nome"], $_POST["email"], $_POST["instit"], $_POST["senha"], $_POST["C_senha"]);
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
                <span class="input-group-addon">Instituição</span>
            </div>
            <select name="instit" class="form-control">
                <option value="UFRN" selected="selected">UFRN</option>
                <option value="UERN">UERN</option>
                <option value="IFRN">IFRN</option>
                <option value="FCST">FCST</option>
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

   <?php include ("rodape.html") ?>
