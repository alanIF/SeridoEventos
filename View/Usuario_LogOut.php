<?php 
    require_once '../Model/connect.php'; 
    require_once '../Controller/ConnectController.php';
        $objControl = new ConnectController();

        $objControl->LogOut();
