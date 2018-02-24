<!DOCTYPE html >
<?php
include './Model/connect.php';
$conn = F_conect();
if (isset($_GET['idevento'])) {
    $idEvt = (int) $_GET['idevento'];
    session_start();
    $_SESSION['IdEvento'] = $idEvt;
    $result = "SELECT * FROM markers WHERE id =" . $_SESSION['IdEvento'];
    $resultado = mysqli_query($conn, $result);
    if ($idEvt != NULL AND $idEvt > 0 AND ( mysqli_num_rows($resultado) > 0)) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $lat = $row['lat'];
            $long = $row['lng'];
        }
        $sql = "SELECT * FROM evento WHERE id =".$idEvt;
        $res2 = mysqli_query($conn, $sql);
        while ($row_res2 = mysqli_fetch_assoc($res2)) {
            $titulo = $row_res2['titulo'];
            $desc = $row_res2['descricao'];
            $link = $row_res2['link_inscricao'];
            $local = $row_res2['local_evento'];
            $ini_ev = date('d/m/Y',  strtotime($row_res2['inicio_evento']));
            $fim_ev = date('d/m/Y', strtotime($row_res2['fim_evento']));
        }
        if(empty($link)){
            $link = "O evento não possui web site.";
        }
        ?>
        <html lang="en">

            <head>
                <meta charset="utf-8" />
                <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
                <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
                <title>Seridó Eventos Universitários</title>
                <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
                <link href="assets/css/bootstrap.css" rel="stylesheet" />
                <link href="assets/css/gaia.css" rel="stylesheet"/>

                <!--     Fonts and icons     -->
                <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
                <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
                <link href="assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
                <style>
                    /* Always set the map height explicitly to define the size of the div
                     * element that contains the map. */
                    #map {
                        height: 400px;
                        width: 400px;
                    }
                    /* Optional: Makes the sample page fill the window. */
                    html, body {
                        height: 100%;
                        margin: 0;
                        padding: 0;
                    }
                </style>
                <script>
                    var customLabel = {
                        restaurant: {
                            label: 'R'
                        },
                        bar: {
                            label: 'B'
                        }
                    };

                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long; ?>),
                            zoom: 16
                        });
                        var infoWindow = new google.maps.InfoWindow;

                        // Change this depending on the name of your PHP or XML file
                        downloadUrl('busca.php', function(data) {
                            var xml = data.responseXML;
                            var markers = xml.documentElement.getElementsByTagName('marker');
                            Array.prototype.forEach.call(markers, function(markerElem) {
                                var name = markerElem.getAttribute('name');
                                var address = markerElem.getAttribute('address');
                                var type = markerElem.getAttribute('type');
                                var point = new google.maps.LatLng(
                                        parseFloat(markerElem.getAttribute('lat')),
                                        parseFloat(markerElem.getAttribute('lng')));

                                var infowincontent = document.createElement('div');
                                var strong = document.createElement('strong');
                                strong.textContent = name
                                infowincontent.appendChild(strong);
                                infowincontent.appendChild(document.createElement('br'));

                                var text = document.createElement('text');
                                text.textContent = address
                                infowincontent.appendChild(text);
                                var icon = customLabel[type] || {};
                                var marker = new google.maps.Marker({
                                    map: map,
                                    position: point,
                                    label: icon.label
                                });
                                marker.addListener('click', function() {
                                    infoWindow.setContent(infowincontent);
                                    infoWindow.open(map, marker);
                                });
                            });
                        });
                    }



                    function downloadUrl(url, callback) {
                        var request = window.ActiveXObject ?
                                new ActiveXObject('Microsoft.XMLHTTP') :
                                new XMLHttpRequest;

                        request.onreadystatechange = function() {
                            if (request.readyState == 4) {
                                request.onreadystatechange = doNothing;
                                callback(request, request.status);
                            }
                        };

                        request.open('GET', url, true);
                        request.send(null);
                    }

                    function doNothing() {
                    }
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
                    <a href="index.php" class="navbar-brand">
                        Seridó Eventos Universitários
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right navbar-uppercase">
                     
                        <li class="dropdown">
                            <a href="#gaia" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-share-alt"></i> Redes Sociais
                            </a>
                            <ul class="dropdown-menu dropdown-danger">
                                <li>
                                    <a href="#"><i class="fa fa-facebook-square"></i> Facebook</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i> Instagram</a>
                                </li>
                            </ul>
                        </li>
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
                    <h2 class="title" id="det_">Detalhes do evento</h2>
                    <div class="col-md-5 col-md-offset-1">
                        <h3>Local <i class="fa fa-map-marker" aria-hidden="true"></i></h3>
                     <div id="map"></div>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <h3><i class="fa fa-group" aria-hidden="true"></i>&emsp;<?php echo $titulo; ?></h3>
                        <p><i class="fa fa-newspaper-o" aria-hidden="true"></i>&emsp;<?php echo $desc; ?></p>
                        <p><i class="fa fa-home" aria-hidden="true"></i>&emsp;<?php echo $local; ?></p>
                        <p><i class="fa fa-calendar-o" aria-hidden="true"></i>&emsp;De&ensp; <?php echo $ini_ev; ?>
                                                                                &ensp;a&ensp;<?php echo $fim_ev; ?></p>
                        <p><i class="fa fa-link" aria-hidden="true"></i>&emsp;<?php echo $link; ?></p>
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
                                            <i class="fa fa-facebook-square"></i> Equipe de Desenvolvedores 4teto
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


                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7v2r6t2nKX_SmvizTFWTXnaodIbIEkqQ&callback=initMap">
                </script>
            </body>
        </html>



        <?php
    } else {
        echo "<script language= 'JavaScript'> location.href='index.php' </script>";
    }
} else {
    echo "<script language= 'JavaScript'> location.href='index.php' </script>";
}
?>