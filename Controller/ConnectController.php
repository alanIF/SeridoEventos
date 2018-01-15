<?php

Class ConnectController{
    
    public function verificarlogin() {
        testLogado();
    }
    
    public function RealizarLogin($email, $senha) {
        require '../Model/connect.php';
        logar($email, $senha);
        
    }
    public function LogOut() {
        sair();
    }
}