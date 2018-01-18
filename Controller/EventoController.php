<?php
     require_once '../Model/Evento.php';
Class EventoController{
    
    public function CadastrarEvento($titulo, $curso, $link, $inicio, $fim,$local,$descricao,$cor,$id_usuario) {
		$inicio =date('Y-m-d H:i:s', strtotime($inicio));
		$fim =date('Y-m-d H:i:s', strtotime($fim));

       return cadastrarEvento($titulo, $curso, $link, $inicio, $fim,$local,$descricao,$cor,$id_usuario);
    }
    
    public function ListarEventos($usuario) {
        return listarEventos($usuario);
    }
   
     public function RecuperarEvento($id) {
        return RecuperarEvento($id);
    }
    
      public function AtualizarEvento($titulo, $curso, $link, $inicio, $fim,$local,$descricao,$cor,$id) {
		$inicio =date('Y-m-d H:i:s', strtotime($inicio));
		$fim =date('Y-m-d H:i:s', strtotime($fim));

       return atualizarEvento($titulo, $curso, $link, $inicio, $fim,$local,$descricao,$cor,$id);
    }
     public function excluir_Evento($id) {
        excluir_Evento($id);
    }
   
    
}    
