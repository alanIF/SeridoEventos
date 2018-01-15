<?php
     require_once '../Model/Usuario.php';
Class UsuarioController{
    
    public function CadastrarUsuario($nome, $email, $nivel, $senha, $C_senha) {
        
        if($senha != NULL and $senha === $C_senha){
            cadastrar($nome, $email, $nivel, $senha);
            
       }
    }
    
    public function ListarProfessores() {
        return listarUsuarios();
    }
   
     public function RecuperarProfessores($id) {
        return RecuperarUsuarios($id);
    }
    
    public function ExcluirUsuario($id) {
        excluir($id);
        header( "Location: Usuario_listar.php");
    }
    
    public function EditarProfessor($nome, $email, $nivel, $senha, $C_senha,$id) {
        if($senha != NULL and $senha === $C_senha){
            editarProfessor($nome, $email, $nivel, $senha, $id);
            
       }
    }
    
}    
