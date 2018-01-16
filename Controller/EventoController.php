<?php
     require_once '../Model/Evento.php';
Class EventoController{
    
    public function CadastrarEvento($titulo, $curso, $link, $inicio, $fim,$local,$descricao,$cor,$id_usuario) {
		$inicio =date('Y-m-d H:i:s', strtotime($inicio));
		$fim =date('Y-m-d H:i:s', strtotime($fim));

       return cadastrarEvento($titulo, $curso, $link, $inicio, $fim,$local,$descricao,$cor,$id_usuario);
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
