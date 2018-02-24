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
    
    public function EditarUsuario($nome, $email, $instituicao,$validacao,$tipo,$id) {
            editarUsuario($nome, $email, $instituicao, $validacao,$tipo,$id);
    }
    
    public function EditarPerfil ($nome, $email, $inst, $senha, $confSenha, $id){
            if($senha == $confSenha){
                editarPerfil ($nome, $email, $inst, $senha,$id);
            }  else {
                Alert("Ops!", "Senhas não coincidem!", "danger");
            }
    }
    
}    
