<?php
  include_once "../Clases/Conexion.php";
  session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location:../login.php');
		exit();
	}

  $ConexionBD = new Conexion();
 $select ="SELECT MAX(Id) as IdProyecto FROM PROYECTO";
foreach ($ConexionBD -> query($select) as $resultado){//imprime los valores 

  $ResultadoId= $resultado["IdProyecto"];
  $ResultadoIdProyecto = $ResultadoId + 1;
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta Proyectos</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="../favicon_16.ico"/>
    <link rel="bookmark" href="../favicon_16.ico"/>
    <!-- site css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
    <link rel="stylesheet" href="../dist/css/site.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../dist/js/site.min.js"></script>
    <script type="text/javascript" src="procedimientos.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <!--Archivos de SweetAlert-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/5.3.2/sweetalert2.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/sweetalert2/5.3.2/sweetalert2.min.js"></script>

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
                      <div class="panel-title" style="color:white; text-align: center; font-size: 20px"><b>Alta de Proyecto</b>
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
                          <label class="col-md-2 control-label" style="font-size: 14px">Numero de Proyecto:</label>
                          <div class="col-md-10">
                            <input type="text" required placeholder="Numero" id="numP" class="form-control" name="numP" value="<?php echo $ResultadoIdProyecto ?>" readonly = "readonly">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Titulo del Proyecto:</label>
                          <div class="col-md-10">
                            <input type="text" required placeholder="Titulo" id="tituloP" class="form-control" name="tituloP">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Año de Inicio</label>
                          <div class="col-md-10">
                            <input type="number" required="" placeholder="Año de Inicio" id="aInicioP" class="form-control" name="aInicioP">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Año de Fin</label>
                          <div class="col-md-10">
                            <input type="number" placeholder="Año de Fin" id="aFinP" class="form-control" name="aFinP">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Monto Autorizado</label>
                          <div class="col-md-10">
                            <input type="text" placeholder="Monto Autorizado" id="mAutorizadoP" class="form-control" name="mAutorizadoP">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Monto Empresa</label>
                          <div class="col-md-10">
                            <input type="text" placeholder="Monto Empresa" id="mEmpresaP" class="form-control" name="mEmpresaP">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Monto Externo</label>
                          <div class="col-md-10">
                            <input type="text" placeholder="Monto Externo" id="mExternoP" class="form-control" name="mExternoP">
                          </div>
                        </div>
                        <div class="form-group" >
                          <label class="col-md-2 control-label" style="font-size: 14px">Persona Responsable</label>
                          <div class="col-md-10" id="cargaR">
                            <select class="form-control js-example-responsive" name="idRespo" id="idRespo" style="width: 100%" >
                              <option value="" selected="selected">Selecciona un Responsable</option>
                            </select>
                          </div>
                        </div>
                        <!--agregar nuevo respo-->
                        <div class="">
                          <div class="col-sm-offset-2 ">
                            <button type="button" class="btn btn-link " data-toggle="modal" data-target="#myModal" style="margin-top: -55px; ">
                              Agregar Nuevo Responsable
                            </button>
                          </div>
                        </div>
                          <!-- Modal -->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header" style="background-color: #A96317">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel" style="color: white; text-align: center;">Agregar Responsable</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="">
                                    <label for="recipient-name" class="control-label" style="font-size: 13px">Nombre:</label>
                                    <input type="text" required placeholder="Nombre del Nuevo Responsable" id="nombreR" class="form-control" name="nombreR" required="on">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="LimpiarInputRespo();">Cancelar</button>
                                  <button type="button" class="btn btn-success" onclick="NewResponsable();">Registrar Responsable</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                        <div class="form-group" >
                          <label class="col-md-2 control-label" style="font-size: 14px">Estatus del Proyecto</label>
                          <div class="col-md-10">
                            <select class="form-control js-example-responsive" name="idEsta" id="idEsta" style="width: 100%">
                              <option value="">Estatus del Proyecto</option>
                              <?php
                                $ConexionBD = new Conexion();
                                $select ="SELECT * FROM ESTATUS";

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
                          <label class="col-md-2 control-label" style="font-size: 14px">Cobertura</label>
                          <div class="col-md-10">
                            <select class="form-control js-example-responsive" name="idCobe" id="idCobe" style="width: 100%">
                              <option value="">Selecciona la Cobertura</option>
                              <?php
                                $ConexionBD = new Conexion();
                                $select ="SELECT * FROM COBERTURA";

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
                          <label class="col-md-2 control-label" style="font-size: 14px">Fondo</label>
                          <div class="col-md-10" id="cargaF">
                            <select class="form-control js-example-responsive" name="idFon" id="idFon" style="width: 100%">
                              <option value="">Selecciona el Fondo</option>
                              
                            </select>
                          </div>
                        </div>
                        <!--agregar nuevo respo-->
                        <div class="">
                          <div class="col-sm-offset-2 ">
                            <button type="button" class="btn btn-link " data-toggle="modal" data-target="#myModal2" style="margin-top: -30px; ">
                              Agregar Nuevo Fondo
                            </button>
                          </div>
                        </div>
                        <!-- Modal -->
                          <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header" style="background-color: #A96317">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel" style="color: white; text-align: center;">Agregar Fondo</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="">
                                    <label for="recipient-name" class="control-label" style="font-size: 13px">Nombre Fondo:</label>
                                    <input type="text" required placeholder="Nombre del Nuevo Fondo" id="nombreF" class="form-control" name="nombreF" required="on">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="LimpiarInputFondo();">Cancelar</button>
                                  <button type="button" class="btn btn-success" onclick="NewFondo();">Registrar Fondo</button>
                                </div>
                              </div>
                            </div>
                          </div>
												<div class="form-group">
                          <label class="col-md-2 control-label" style="font-size: 14px">Territorio</label>
                          <div class="col-md-10">
                            <select class="form-control" name="idTerri" id="idTerri" style="width: 100%;">
                              <option value="">Selecciona el Territorio</option>
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
                          <label class="col-md-2 control-label" style="font-size: 14px">Area de Conocimiento</label>
                          <div class="col-md-10">
                            <select class="form-control js-example-responsive" name="idAre" id="idAre" style="width: 100%">
                              <option value="">Selecciona el Area de Conocimiento Perteneciente</option>
                              <?php
                                $ConexionBD = new Conexion();
                                $select ="SELECT * FROM  AREA_CONOCIMIENTO";

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
                            <button class="btn btn-success" type="button" id="registrarProyecto" name="registrarProyecto" onclick="RegistrarProyecto();">Registrar Proyecto</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                </div>
                
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
        $("#idRespo").select2();
        $("#idEsta").select2();
        $("#idCobe").select2();
        $("#idFon").select2();
        $("#idTerri").select2();
      });

    </script>


  
  </body>
</html>
