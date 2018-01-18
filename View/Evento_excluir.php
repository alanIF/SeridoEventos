<?php
           
        //CONECTAR          
        require_once '../Model/connect.php';            
        require_once '../Controller/EventoController.php';
        require_once '../Controller/ConnectController.php';
        $objConnecta = new ConnectController();
        
        //$objConnecta->verificarlogin();
        
if ((isset($_GET['id']))) {
        require_once '../Controller/EventoController.php';
        $id = (int) $_GET['id'];

        
        $objControl = new EventoController();
        $objControl->excluir_Evento($id);

    }else{
        
        header("Location: Evento_listar.php");
        
    }

?>