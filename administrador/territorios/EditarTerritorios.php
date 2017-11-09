<?php
  include_once "../Clases/Conexion.php";
  session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location:../login.php');
		exit();
	}

  $id = $_GET['id'];
  $ConexionBD = new Conexion();
  $select = "SELECT nombre,latitud,longitud FROM TERRITORIO WHERE id = '$id'";
  foreach($ConexionBD -> query($select) as $Datos){
    $Nombre = $Datos["nombre"];
    $Latitud = $Datos["latitud"];
    $Longitud = $Datos["longitud"];
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
                      <div class="panel-title" style="color:white; text-align: center; font-size: 20px"><b>Editar Datos de Territorio</b>
                      </div>

                      <div class="panel-options">
                        <a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
                        <a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
                        <a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
                      </div>
                    </div>

                    <div class="panel-body">
                      <form action="procesar_EditarTerritorios.php?id=<?=$id?>" method="POST" role="form" class="form-horizontal">
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Nombre:</label>
                          <div class="col-md-10">
                            <input type="text" required id="nombreT" class="form-control" name="nombreT" value="<?=$Nombre?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Latitud:</label>
                          <div class="col-md-10">
                            <input type="text" required="" id="latitudT" class="form-control" name="latitudT" value="<?=$Latitud?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Longitud:</label>
                          <div class="col-md-10">
                            <input type="text" required="" id="longitudT" class="form-control" name="longitudT" value="<?=$Longitud?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-offset-2 col-md-10">
                            <button class="btn btn-success" type="submit">Actualizar Territorio</button>
                          </div>
                        </div>
                      </form>
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
  </body>
</html>