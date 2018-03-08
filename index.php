<!DOCTYPE html>
 <?php 
                    require './Model/Calendar.php';
                    require './Model/connect.php';
                    atualizarStatusEvento();
                    $evts = allEventos();
                    $tam = count($evts);
?>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/icon.png">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Seridó Eventos Universitários</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/gaia.css" rel="stylesheet"/>

        <!--     Fonts and icons     -->
        <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
       
        <link href='assets/css/fullcalendar.min.css' rel='stylesheet' />
	<link href='assets/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        
        <link href='assets/css/personalizado.css' rel='stylesheet' />
        <script src='assets/js/moment.min.js'></script>
	<script src='assets/js/jquery.min.js'></script>
	<script src='assets/js/fullcalendar.min.js'></script>
	<script src='assets/locale/pt-br.js'></script>
 <style>
#paginacao {
        color:white;
}
</style>
<script>
			$(document).ready(function() {
				$('#calendario').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
						
					},
					defaultDate: Date(),
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
                                        events: [
						<?php for($i=0; $i < $tam; $i++){ ?>
								{
								id: '<?php echo $evts[$i]['id']; ?>',
								title: '<?php echo $evts[$i]['titulo']; ?>',
								start: '<?php echo $evts[$i]['inicio_evento']; ?>',
								end: '<?php echo $evts[$i]['fim_evento']; ?>',
								color: '<?php echo $evts[$i]['cor']; ?>',
								url: 'detalhes.php?idevento=<?php echo $evts[$i]['id']; ?>#det_',
								},
                                                <?php
							}
						?>
					]
				});
			});
		</script> 
    </head>

    <body>

        <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" >
            <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
            <div class="container">
                <div class="navbar-header">
                    <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a href="" class="navbar-brand">
                        Seridó Eventos Universitários
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right navbar-uppercase">
                     
                        <li> <a href="View/" class="btn btn-danger btn-fill"> Entrar</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
       

        <div class="section section-header">
            <div class="parallax filter filter-color-red">
                <div class="image"
                     style="background-image: url('assets/img/header-2.jpeg')">
                </div>
                <div class="container">
                    <div class="content">
                        <div class="title-area">
                            <p>Bem vindo(a)</p>
                            <h1 class="title-modern">Calendário de Eventos</h1>
                            <h3>Todos os eventos universitários da região do seridó</h3>
                            <div class="separator line-separator">♦</div>
                        </div>

                        <div></div>
                    </div>

                </div>
            </div>
        </div>


        <div class="section">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                    <div id='calendario'></div>
                    </div>
               </div>     
            </div>
        </div>


        <div class="section section-our-team-freebie">
            <div class="parallax filter filter-color-black">
                <div class="image" style="background-image:url('assets/img/header-2.jpeg')">
                </div>
                <div class="container">
                    <div class="content">
                        <div class="row">
                            <div class="title-area">
                                <h2>Próximos Eventos Universitários</h2>
                                <div class="separator separator-danger">✻</div>
                                <p class="description">Próximos Eventos Universitários na Região do Seridó</p>
                            </div>
                        </div>

                        <div class="team">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="row">
                                        
                                       <ul class="nav nav-tabs">
  
     <?php
                require_once './Model/connect.php';
     $conn = F_conect();
    $result = mysqli_query($conn, "Select * from evento where status=0 order by fim_evento DESC");
    
    $i = 0;
    $eventos = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {
            $eventos[$i]['id'] = $row['id'];

            $eventos[$i]['titulo'] = $row['titulo'];
            $eventos[$i]['descricao'] = $row['descricao'];
            $eventos[$i]['local_evento'] = $row['local_evento'];
            $eventos[$i]['curso'] = $row['curso'];
            $eventos[$i]['inicio_evento'] = date('d/m/Y',  strtotime($row['inicio_evento']));
            $eventos[$i]['fim_evento'] = date('d/m/Y',  strtotime($row['fim_evento']));
            $eventos[$i]['link_inscricao'] = $row['link_inscricao'];

            $i++;
        }
    }
    $conn->close();
                    $tamanho =$i;
                    $numero_paginacao=(int)($tamanho / 3);
                    if ($numero_paginacao > 0) {
                        for ($i = 0; $i <= $numero_paginacao; $i++) {
                           $pagina=$i+1;
                           echo "<li><a data-toggle='tab' href='#".$pagina."' id='paginacao' >Pagina ".$pagina."</a></li>";
                        }
                    }else{
                          echo " <li class='active'><a data-toggle='tab' href='#1'  id='paginacao'>Página 1</a></li>";

                        
                    }
                    ?>
  
 
  </ul>

  <div class="tab-content">
      
        <br/>
        <?php
            $next_tab=1;
            $contador=0;
          for ($i = 0; $i < $tamanho; $i++) {
              if($i==0){
                  echo "<div id='".$next_tab."' class='tab-pane fade in active'>";
                  $contador=0;
              }
              if($contador>2){
                  $next_tab=$next_tab+1;
                  echo "</div>";
                  echo "<div id='".$next_tab."' class='tab-pane fade'>";
                  $contador=0;
              }
              echo '<div class="col-md-4"><a href="detalhes.php?idevento='.$eventos[$i]['id'].'#det_"><div class="card card-member"><div class="content"><div class="description">';
              echo "<h3 class='title'>".$eventos[$i]['titulo']."</h3>";
              echo "<p class='description'>".$eventos[$i]['descricao']."</p>";
              echo "<p class='description'>Local Evento: ".$eventos[$i]['local_evento']."</p>";
              echo "<p class='description'>Curso: ".$eventos[$i]['curso']."</p>";
               echo "<p class='description'>Inicio do Evento: ".$eventos[$i]['inicio_evento']."</p>";
               if($eventos[$i]['link_inscricao'] != '#'){
               echo "<p class='description'><a href='http://".$eventos[$i]['link_inscricao']."'  target='window'>Link para Inscrição</a></p></div></div></div></a></div>";
               }else{
                   echo '</div></div></div></a></div>';
               }

                      $contador=$contador+1;   

                            
           }
           
               echo "</div>";
           
        ?>
    
  
  </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section section-our-clients-freebie">
            <div class="container">
                <div class="title-area">
                    <h5 class="subtitle text-gray">Parceiros </h5>
                    <h2>Instituiçoes</h2>
                    <div class="separator separator-danger">∎</div>
                </div>

                <ul class="nav nav-text" role="tablist">
                    <li class="active">
                        <a href="#testimonial1" role="tab" data-toggle="tab">
                            <div class="image-clients">
                                <img alt="..." class="img-circle" src="assets/img/faces/face_7.jpg"/>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#testimonial2" role="tab" data-toggle="tab">
                            <div class="image-clients">
                                <img alt="..." class="img-circle" src="assets/img/faces/face_8.jpg"/>
                            </div>
                        </a>
                    </li>
                         <li>
                        <a href="#testimonial3" role="tab" data-toggle="tab">
                            <div class="image-clients">
                                <img alt="..." class="img-circle" src="assets/img/faces/face_9.jpg"/>
                            </div>
                        </a>
                    </li>
                </ul>


                <div class="tab-content">
                    <div class="tab-pane active" id="testimonial1">
                        <p class="description">
                            Universidade Federal do Rio Grande do Norte<br/>
                             Rua Joaquim Gregório, S/N, Penedo, 59.300-000<br/>
                             Email:secretariacaico@ceres.ufrn.br<br/>

                     
                            Telefone:(84) 3342-2238 | (84) 3421-4908 | (84) 99193-6052

                        </p>
                    </div>
                    <div class="tab-pane" id="testimonial2">
                        <p class="description"> 
                            Instituto Federal do Rio Grande do Norte.<br/>
                            RN 288, s/n, Nova Caicó | Caicó-RN | CEP: 59300-000<br/>
E-mail:
cocsev.ca@ifrn.edu.br<br/>
Telefone:
(84) 4005-4102
                        </p>
                    </div>
                    <div class="tab-pane" id="testimonial3">
                        <p class="description"> Universidade do Estado do Rio Grande do Norte.
                            <br/>
                             Av. Rio Branco, 725, Caicó - RN, 59300-000<br/>
                             Telefone:(84) 3421-6513<br/>
                             Email:caico@uern.br
                        </p>
                    </div>

                </div>

            </div>
        </div>


 


        <footer class="footer footer-big footer-color-black" data-color="black">
            <div class="container">
                <div class="row">
                 
                   
                    <div class="col-md-2 col-md-offset-1 col-sm-3">
                        <div class="info">
                            <h5 class="title">Segui-nos</h5>
                            <nav>
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/groups/239083846144738/" class="btn btn-social btn-facebook btn-simple">
                                            <i class="fa fa-facebook-square"></i> Facebook
                                        </a>
                                    </li>
                                  <li>
                                        <a href="http://4bsi.000webhostapp.com" class="btn btn-social btn-facebook btn-simple">
                                            <i class="fa fa-link"></i> Equipe de Desenvolvedores 4teto
                                        </a>
                                    </li>
                                   
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="copyright">
                    © <script> document.write(new Date().getFullYear())</script> Desenvolvido por Alan Tavares e Janailton Galvão.
                </div>
            </div>
        </footer>

    </body>

    <!--   core js files    -->
    <!--ESSE TANSO DE BAIXO QUE DAVA ERRO-->
<!--    <script src="assets/js/jquery.min.js" type="text/javascript"></script>--> 
    <script src="assets/js/bootstrap.js" type="text/javascript"></script>

    <!--  js library for devices recognition -->
    <script type="text/javascript" src="assets/js/modernizr.js"></script>

    <!--  script for google maps   -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
    <script type="text/javascript" src="assets/js/gaia.js"></script>

</html>
