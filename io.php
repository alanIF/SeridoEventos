<?php
                    require './Model/Calendar.php';
                    require './Model/connect.php';
                    $eventos = allEventos();
                    $tam = count($eventos);
?>

<link href='assets/css/fullcalendar.min.css' rel='stylesheet' />
	<link href='assets/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link href='assets/css/personalizado.css' rel='stylesheet' />
        
	<script src='assets/js/moment.min.js'></script>
	<script src='assets/js/jquery.min.js'></script>
	<script src='assets/js/fullcalendar.min.js'></script>
	<script src='assets/locale/pt-br.js'></script>
        <script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
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
								id: '<?php echo $eventos[$i]['id']; ?>',
								title: '<?php echo $eventos[$i]['titulo']; ?>',
								start: '<?php echo $eventos[$i]['inicio_evento']; ?>',
								end: '<?php echo $eventos[$i]['fim_evento']; ?>',
								color: '<?php echo $eventos[$i]['cor']; ?>',
								},
                                                <?php
							}
						?>
					]
				});
			});
		</script> 
 <div id='calendar'></div>
