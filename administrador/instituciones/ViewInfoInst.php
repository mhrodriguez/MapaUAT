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
    <title>Vista Informacion Instituciones</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="../favicon_16.ico"/>
    <link rel="bookmark" href="../favicon_16.ico"/>
    <!-- site css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../dist/css/site.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../dist/js/site.min.js"></script>
    <!--Archivos de DataTable-->
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
		<script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<!--Archivos de SweetAlert-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/5.3.2/sweetalert2.css">
		<script type="text/javascript" src="https://cdn.jsdelivr.net/sweetalert2/5.3.2/sweetalert2.min.js"></script>
		<script>
      $(document).ready(function(){
          $('#InfoTerritorios').DataTable();
      });
			
			function Eliminar(id){
				swal({
				title: 'Seguro que Quieres Eliminar Este Registro?',
				text: "Cuando se elimina una Institución se pierden todos los datos almacenados!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				cancelButtonText:'Cancelar',
				confirmButtonText: 'Si, eliminar Institución!'}).then(function() {
					Procesar_Eliminar(id);
				}).done();
			}
			
			function Procesar_Eliminar(id){
				//alert("llego a la segunda funcion id= "+id);
				var opcion=1;
				$.ajax({
					type:'POST',
					url:"Procesar_EliminarInst.php",
					data: {opcion:opcion,id:id},
					success:function(respuesta){
						swal('Institución Eliminada!',
							'La Institución fue eliminada exitosamente.',
							'success').then(function(){
							location.reload(true);
						});
					}
				});
			}
    </script>
  </head>
  <body>
    <!--nav-->
    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand" style="color:white; font-weight: bold;">Proyectos UPVictoria</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <!-- <li class="active"><a href="getting-started.html">Getting Started</a></li>
              <li class="active"><a href="index.html">Documentation</a></li> -->
              <!-- <li class="disabled"><a href="#">Link</a></li> -->
              <li class="dropdown">
                <?php
               echo  "<a data-toggle='dropdown' class='dropdown-toggle' href='#'><i class='fa fa-user'></i>&nbsp&nbsp".$_SESSION['nombre']."<b class='caret'></b></a>"
								?>
                <ul role="menu" class="dropdown-menu">
                  <li class="dropdown-header">Opciones</li>
                  <li class="divider"></li>
                  <li class=""><a href="#">Salir</a></li>
                </ul>
              </li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!--header-->
    <div class="container-fluid">
    <!--PANEL DE MENU IZQUIERDO-->
        <div class="row row-offcanvas row-offcanvas-left">
          <?php
            include_once "../menu.php";      
           ?>
          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Fondos</h3>
              </div>
              <!--inicio del cuerpo-->
              <div class="panel-body">
                <div class="content-row">

                  <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #FF6400;">
                      <div class="panel-title" style="color:white; text-align: center; font-size: 20px"><b>Listado de Instituciones</b>
                      </div>

                      <div class="panel-options">
                        <a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
                        <a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
                        <a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
                      </div>
                    </div>

                    <div class="panel-body">
                          <div class="table-responsive">
                            <table class="table display table table-striped table-bordered datatable" id="InfoTerritorios" cellspacing="0" width="100%">
                              <thead>
                                <tr>
                                  <th style=" text-align: center; ">Id Institución</th>
                                  <th style=" text-align: center; ">Nombre</th>
                                  <th style=" text-align: center; ">Opcion Editar</th>
																	<th style=" text-align: center; ">Opcion Eliminar</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                   $ConexionBD = new Conexion();
                                   $select ="SELECT * FROM institucion";
                                  foreach ($ConexionBD -> query($select) as $resultado){//imprime los valores 
																		echo "<tr>";
                                    echo "<td style=' text-align: center; '>".$resultado["id"]."</td>";
                                    echo "<td style=' text-align: center; '>".$resultado["nombre"]."</td>";
                                    echo "<td style=' text-align: center; '>"."<a href='EditarInst.php?id=$resultado[id]'><button class='btn btn-success ' border: none;'>Editar</button></a>"."</td>";
                                    echo "<td style=' text-align: center; '>"."<button class='btn btn-danger' border: none;' onclick='Eliminar($resultado[id]);'>Eliminar</button></a>"."</td>";
                                    echo "</tr>";
                                  }
                                  ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

                </div>
                <img class="espacio-imagen center-block"  src="../imagenes/LogoUPV.png">
              </div><!-- panel body -->
            </div>
          </div><!-- content -->
        </div>
      </div>
    <!--footer-->
    <div class="site-footer">
      <div class="container">
        <!-- <hr class="dashed" /> Este es un separador-->
        <div class="row">
          <div class="col-md-6">
            <h3>Contactanos</h3>
            <ul>
              <li>Twittea con nosotros <a href="https://twitter.com" target="_blank">@Soluciones Castillo</a>&nbsp;&nbsp;&nbsp;&nbsp;Email de Contacto <span class="connect">contacto@upv.edu.mx</span></li>
              <li>
                <a title="Twitter" href="https://twitter.com" target="_blank" rel="external nofollow"><i class="icon" data-icon="&#xe121"></i></a>
                <a title="Facebook" href="https://www.facebook.com" target="_blank" rel="external nofollow"><i class="icon" data-icon="&#xe10b"></i></a>
                <a title="Google+" href="https://plus.google.com/" target="_blank" rel="external nofollow"><i class="icon" data-icon="&#xe110"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <hr class="dashed" />
        <div class="copyright clearfix">
          <p><b>Proyectos de la Universidad Politecnica de Victoria</b></p>
          <p>Desarrollado por Soluciones Castillo.</p>
        </div>
      </div>
    </div>   
  </body>
</html>