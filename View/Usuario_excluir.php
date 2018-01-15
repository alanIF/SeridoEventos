<?php
           
        //CONECTAR          
        require_once '../Model/connect.php';            
        require_once '../Controller/UsuarioController.php';
        require_once '../Controller/ConnectController.php';
        $objConnecta = new ConnectController();
        
        //$objConnecta->verificarlogin();
        
if ((isset($_GET['id']))) {
        require_once '../Controller/UsuarioController.php';
        $idUsuario = (int) $_GET['id'];

        
        $objControl = new UsuarioController();
        $objControl->ExcluirUsuario($idUsuario);
    }else{
        
        header("Location: Usuario_listar.php");
        
    }

?>