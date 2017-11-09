<?php
  include_once "../Clases/Conexion.php";
  session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location:../login.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta de Territorios</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="../favicon_16.ico"/>
    <link rel="bookmark" href="../favicon_16.ico"/>
    <!-- site css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../dist/css/site.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../dist/js/site.min.js"></script>


  </head>
  <body>
    <!--Agregar el la barra superior y el menu-->
        <?php
          include_once "../menu.php";      
        ?>
          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Territorios</h3>
              </div>
              <!--inicio del cuerpo-->
              <div class="panel-body">
                <div class="content-row">

                  <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #A96317;">
                      <div class="panel-title" style="color:white; text-align: center; font-size: 20px"><b>Alta de Territorio</b>
                      </div>

                      <div class="panel-options">
                        <a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
                        <a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
                        <a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
                      </div>
                    </div>

                    <div class="panel-body">
                      <form action="procesar_AltaTerritorio.php" method="POST" role="form" class="form-horizontal">
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Nombre:</label>
                          <div class="col-md-10">
                            <input type="text" required placeholder="Nombre del Territorio" id="nombreT" class="form-control" name="nombreT">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Latitud:</label>
                          <div class="col-md-10">
                            <input type="text" required="" placeholder="La Latitud es Tomada al Posicionar el Marcador" id="latitudT" class="form-control" name="latitudT" readonly = "readonly">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Longitud:</label>
                          <div class="col-md-10">
                            <input type="text" required="" placeholder="La Longitud es Tomada al Posicionar el Marcador" id="longitudT" class="form-control" name="longitudT" readonly = "readonly">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-offset-2 col-md-10">
                            <button class="btn btn-success" type="submit">Registrar Territorio</button>
                          </div>
                        </div>
                      </form>
											<h4>Selecciona la Ubicación</h4>
											<div id="map" style="width:100%;height:350px"></div>
                    </div>
                  </div>

                </div>
                <!-- <img class="espacio-imagen center-block"  src="../imagenes/LogoUPV.png"> -->
              </div><!-- panel body -->
            </div>
          </div><!-- content -->
        </div>
      </div>
    <!--footer-->
    <?php 
      include '../footerInt.php';
    ?>
		<script>
			var marker;
			function initMap() {
        //creamos el objeto mapa y le decimos en donde lo vamos a posicionar.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 24.6635213, lng: -101.2431644},
          scrollwheel: false,
          zoom: 5
        });
				
				marker  = new google.maps.Marker({
					map: map,
					draggable: true,
					animation: google.maps.Animation.DROP,
					position: {lat:23.729412,lng:-99.0768957},
				});
				
				 marker.addListener('click', toggleBounce);
      
				marker.addListener( 'dragend', function (event)
				{
					//escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
					document.getElementById("latitudT").value = this.getPosition().lat();
					document.getElementById("longitudT").value = this.getPosition().lng();
				});
				function toggleBounce() {
					if (marker.getAnimation() !== null) {
						marker.setAnimation(null);
					} else {
						marker.setAnimation(google.maps.Animation.BOUNCE);
					}
				}
			}
		</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsY47OKQuf8E84yhOyskwlvuWr9nf6YJk&callback=initMap"
    async defer></script>
  </body>
</html>