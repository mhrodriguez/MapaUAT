<?php
  include_once "../Clases/Conexion.php";
  session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location:../login.php');
		exit();
	}

  $id = $_GET['id'];
  $ConexionBD = new Conexion();
  $select = "SELECT nombre FROM COBERTURA WHERE id = '$id'";
  foreach($ConexionBD -> query($select) as $Datos){
    $Nombre = $Datos["nombre"];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta de Cobertura</title>
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
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Coberturas</h3>
              </div>
              <!--inicio del cuerpo-->
              <div class="panel-body">
                <div class="content-row">

                  <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #A96317;">
                      <div class="panel-title" style="color:white; text-align: center; font-size: 20px"><b>Editar Cobertura</b>
                      </div>

                      <div class="panel-options">
                        <a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
                        <a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
                        <a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
                      </div>
                    </div>

                    <div class="panel-body">
                      <form action="procesar_EditarCobeName.php?id=<?=$id?>" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal">
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Nombre:</label>
                          <div class="col-md-10">
                            <input type="text" required placeholder="Nombre de la Cobertura" id="nombreC" class="form-control" name="nombreC" value="<?=$Nombre?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-offset-2 col-md-10">
                            <button class="btn btn-success" type="submit">Actualizar Nombre de Cobertura</button>
                          </div>
                        </div>
                        </form>
                        <form action="procesar_EditarCobeImg.php?id=<?=$id?>" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal">
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Imagen :</label>
                          <div class="col-md-10">
                            <input type="file" required="" id="imagen" class="form-control" name="imagen">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-offset-2 col-md-10">
                            <button class="btn btn-success" type="submit">Actualizar Imagen de Cobertura</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                </div><br><br><br><br>
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