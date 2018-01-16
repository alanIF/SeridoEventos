<?php
include ("topo.phtml");
?>
        <?php


            require_once '../Controller/EventoController.php';
            if (isset($_POST["cadastrar"])) {
                $objControl = new EventoController();
				$id_usuario=1;
				 date('Y-m-d H:i:s', strtotime($_POST['inicio']));

                $objControl->CadastrarEvento($_POST["titulo"], $_POST["curso"], $_POST["link"], $_POST["inicio"], $_POST["fim"],$_POST["local"],$_POST["descricao"],$_POST["cor"],$id_usuario);
            }
        ?> 

<form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Titulo</label>
                                                <input type="text" class="form-control border-input" name="titulo" placeholder="Titulo do Evento" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Curso</label>
                                                <input type="text" class="form-control border-input" placeholder="curso" name="curso">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Link para Inscrição</label>
                                                <input type="email" class="form-control border-input" name="link" placeholder="Link para Inscricão">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
										 <div class="form-group">
                                                <label>Inicio do Evento</label>
                                                <input type="datetime-local" class="form-control border-input" placeholder="Inicio do Evento" name="inicio">
                                            </div>
										
                                        
                                        </div>
                                        <div class="col-md-6">
                                           <div class="form-group">
                                                <label>Fim do Evento</label>
                                                <input type="datetime-local"  class="form-control border-input" placeholder="Fim do Evento" name="fim">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                              <div class="form-group">
                                                <label>Local do Evento</label>
                                                <input type="text" class="form-control border-input" placeholder="Local do Evento" name="local">
                                            </div>
                                        </div>
                                    </div>

                                

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Descrição do Evento</label>
                                                <textarea rows="5" class="form-control border-input" placeholder="Descrição do Evento" name="descricao"></textarea>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
									      <div class="col-md-12">
                                            <div class="form-group">
  <label for="example-color-input" class="col-2 col-form-label">Cor</label>

										  <input type="color" name="cor" placeholder="Escolha a cor do Evento">
											</div>
                                        </div>
									</div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" name="cadastrar">Cadastrar Evento</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>


<?php include ("rodape.html")?>