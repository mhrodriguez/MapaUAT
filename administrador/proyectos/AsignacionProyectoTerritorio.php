<?php
  include_once "../Clases/Conexion.php";
  session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location:../login.php');
		exit();
	}

	if(isset($_POST['Asignacion'])){
		$IdProyecto = $_POST['idProye'];
		$idTerritorio = $_POST['idTerrit'];
	
		$ConexionBD = new Conexion();
		$InsertPT = $ConexionBD -> prepare("INSERT INTO PROYECTO_TERRITORIO (idProyecto, idTerritorio) VALUES ('$IdProyecto','$idTerritorio')");
		$SelectChecar = $ConexionBD -> prepare("SELECT * FROM PROYECTO_TERRITORIO WHERE idProyecto = '$IdProyecto' AND idTerritorio = '$idTerritorio'");
		$SelectChecar->execute();
		
		if($Datos = $SelectChecar -> fetch()){
      echo "<script>";
	  	echo "alert('EL PROYECTO YA TIENE ASIGNADA ESE TERRITORIO!!');";
	  	echo "window.location = 'AsignacionProyectoTerritorio.php';";
	  	echo "</script>";
    }
		else{
			if($InsertPT->execute()==TRUE){
				echo "<script>";
				echo "alert('ASIGNACION REALIZADA CON EXITO!!');";
				echo "window.location = 'AsignacionProyectoTerritorio.php';";
				echo "</script>";
			}else{
				echo "<script>";
				echo "alert('ERROR EN LA ASIGNACION!!');";
				echo "window.location = 'AsignacionProyectoTerritorio.php';";
				echo "</script>";
			}
	}
		
	}//fin de isset

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Asignacion de Proyectos</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="../favicon_16.ico"/>
    <link rel="bookmark" href="../favicon_16.ico"/>
    <!-- site css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../dist/css/site.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../dist/js/site.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

     <style type="text/css">
      .select2-container .select2-selection--single {
        height: 33px;
      }
      .select2-container--default .select2-selection--single .select2-selection__rendered {
          padding-left: 15px;
          line-height: 31px;
          font-size: 14px;
      }
      .select2-results__options {
        font-size: 13.5px;
      }
      .select2-search--dropdown .select2-search__field {
        font-size: 13.5px;
      }
      
    </style>
   
  </head>
  <body>
     <!--Agregar el la barra superior y el menu-->
        <?php
          include_once "../menu.php";      
        ?>
          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Proyectos</h3>
              </div>
              <!--inicio del cuerpo-->
              <div class="panel-body">
                <div class="content-row">

                  <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #A96317;">
                      <div class="panel-title" style="color:white; text-align: center; font-size: 20px"><b>Asingnación de Proyecto - Territorio</b>
                      </div>

                      <div class="panel-options">
                        <a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
                        <a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
                        <a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
                      </div>
                    </div>

                    <div class="panel-body">
											 <form action="" method="POST" role="form" class="form-horizontal">
                   			<div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Titulo del Proyecto</label>
                          <div class="col-md-10">
                            <select class="form-control js-example-responsive" name="idProye" id="idProye" style="width: 100%">
                              <option>Selecciona el Proyecto</option>
                              <?php
                                $ConexionBD = new Conexion();
                                $select ="SELECT * FROM PROYECTO";

                                foreach($ConexionBD -> query($select) as $resultado){
                                  echo "<option value='".$resultado['Id']."'>";
								                  echo $resultado['nombre'];
								                  echo "</option>";
                                }
                              ?>
                            </select>
                          </div>
                        </div>
												 <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Territorio</label>
                          <div class="col-md-10">
                            <select class="form-control js-example-responsive" name="idTerrit" id="idTerrit" style="width: 100%">
                              <option>Selecciona el Territorio</option>
                              <?php
                                $ConexionBD = new Conexion();
                                $select ="SELECT * FROM TERRITORIO";

                                foreach($ConexionBD -> query($select) as $resultado){
                                  echo "<option value='".$resultado['id']."'>";
								                  echo $resultado['nombre'];
								                  echo "</option>";
                                }
                              ?>
                            </select>
                          </div>
                        </div>
												 <div class="form-group">
                          <div class="col-md-offset-2 col-md-10">
                            <button class="btn btn-success" type="submit" id="Asignacion" name="Asignacion">Registrar Asignacion Proyecto - Territorio</button>
                          </div>
                        </div>
											</form>
                    </div>
                  </div>

                </div><br><br><br><br>
                <!-- img class="espacio-imagen center-block"  src="../imagenes/LogoUPV.png"> -->
              </div><!-- panel body -->
            </div>
          </div><!-- content -->
        </div>
      </div>
    <!--footer-->
    <?php 
      include '../footerInt.php';
    ?>
    <script type="text/javascript">
      $(document).ready(function() {
       $("#idProye").select2();
        $("#idTerrit").select2();
      });
    </script>
  </body>
</html>