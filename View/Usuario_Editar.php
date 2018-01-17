    <?php
    $titulo1 = 'Editar usuário';
    $titulo2 = 'Editar usuário';
    require_once './Topo.phtml';
    
    
    if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    include '../Controller/UsuarioController.php';
    $objProva = new UsuarioController();
    $vet = $objProva->RecuperarProfessores($id);
    $nome = $vet[0]['NOME'];
    $email = $vet[0]['EMAIL'];
    $senha = $vet[0]['SENHA'];
    } else {
        echo "<script language= 'JavaScript'>
                                            location.href='erro.php'
                                    </script>";
    }
 
            require_once '../Controller/UsuarioController.php';
            if (isset($_POST["cadastrar"])) {
                $objControl = new UsuarioController();
                $objControl->EditarUsuario($_POST["nome"], $_POST["email"], $_POST["instit"], $_POST["senha"], $_POST["C_senha"], $id);
            }
        ?> 
        <br />
        <form method="post" action="" id="FormSenha" name="FormSenha" onsubmit="return validarSenha();">
            <div class="input-group">
                <span class="input-group-addon">Nome</span>
            </div>
            <input type="text" class="form-control" placeholder="Nome" name="nome" required="required" value="<?php echo $nome;?>"/><br/>


            <div class="input-group">
                <span class="input-group-addon">E-mail</span>
            </div>
            <input type="email" class="form-control" placeholder="E-mail" name="email" required="required" value="<?php echo $email;?>"/><br/>


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
            <input type="password" class="form-control" placeholder="Senha" name="senha" required="required" value="<?php echo $senha;?>"/><br/>


            <div class="input-group">
                <span class="input-group-addon">Confirmar senha</span>
            </div>
            <input type="password" class="form-control" placeholder="Confirmar senha" name="C_senha" required="required"/><br/>

            <input type="submit" class="btn btn-success" name="cadastrar" value="Atualizar"> 
        </form>     

    <?php require_once './Rodape.html'; ?>
