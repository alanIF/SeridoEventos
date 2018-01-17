<?php
     require_once '../Model/Usuario.php';
Class UsuarioController{
    
    public function CadastrarUsuario($nome, $email, $instituicao, $senha, $C_senha) {
        
        if($senha != NULL and $senha === $C_senha){
            cadastrar($nome, $email, $instituicao, $senha);
            
       }
    }
    
    public function ListarProfessores() {
        return listarUsuarios();
    }
   
     public function RecuperarProfessores($id) {
        return RecuperarUsuarios_Editar($id);
    }
    
    public function ExcluirUsuario($id) {
        excluir_Usuario($id);
        header( "Location: Usuario_listar.php");
    }
    
    public function EditarUsuario($nome, $email, $instituicao, $senha, $C_senha,$id) {
        if($senha != NULL and $senha === $C_senha){
            editarUsuario($nome, $email, $instituicao, $senha, $id);
            
       }
    }
    
}    
