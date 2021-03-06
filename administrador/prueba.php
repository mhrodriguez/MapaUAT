<?php
  session_start();
  if (!isset($_SESSION['nombre'])) {
    header('Location:login.php');
    exit();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrador Proyectos UAT</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- site css -->
    <link rel="stylesheet" href="dist/css/site.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="dist/js/site.min.js"></script>
    
  
  </head>
  <body>

    
    <!--nav-->
    <div>
    <nav role="navigation" class="navbar navbar-custom" >
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand" style="color:white; font-weight: bold; font-size: 20px;">Proyectos de la Universidad Autónoma de Tamaulipas</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <!-- <li class="active"><a href="getting-started.html">Getting Started</a></li>
              <li class="active"><a href="index.html">Documentation</a></li> -->
              <!-- <li class="disabled"><a href="#">Link</a></li> -->
              <li class="dropdown">
                <?php
               echo  "<a data-toggle='dropdown' class='dropdown-toggle' href='#' style='font-weight:bold; letter-spacing: .5px; font-size:13px;'><i class='fa fa-user'></i>&nbsp&nbsp".$_SESSION['nombre']."<b class='caret'></b></a>"
                ?>
                <ul role="menu" class="dropdown-menu">
                  <li class="dropdown-header" style="color: white">Opciones</li>
                  <li class="divider"></li>
                  <li class="" ><a href="logout.php" style="color: white; font-size: 13.5px;">Salir</a></li>
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
          <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>MENU</b></li>
                <!-- <li class="list-group-item"><input type="text" class="form-control search-query" placeholder="Search Something"></li> -->
                <li class="list-group-item"><a href="index.php"><i class="glyphicon glyphicon-home"></i>Inicio </a></li>
                <li>
                  <a href="#demo3" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-folder-close"></i>Proyectos  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="demo3">
                   <a href="proyectos/altaProyectos.php" class="list-group-item">Alta de Proyectos  </a>
                   <a href="proyectos/ViewInfoProyectos.php" class="list-group-item">Modificar - Eliminar Proyectos</a>
                    <a href="proyectos/AsignacionProyectoArea.php" class="list-group-item">Asignación de Proyectos con Area</a>
                    <a href="proyectos/AsignacionProyectoInstitucion.php" class="list-group-item">Asignación de Proyectos con Institucion</a>
                    <a href="proyectos/AsignacionProyectoTerritorio.php" class="list-group-item">Asignación de Proyectos con Territorio</a>
                  </div>
                </li>
               <li>
                  <a href="#terri" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-globe"></i>Territorios  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="terri">
                    <a href="territorios/altaTerritorio.php" class="list-group-item">Alta de Territorio </a>
                    <a href="territorios/ViewInfoTerritorios.php" class="list-group-item">Modificar - Eliminar Territorios</a>
                  </div>
                </li> 
                <li>
                  <a href="#cobe" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-screenshot"></i>Cobertura  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="cobe">
                    <a href="cobertura/altaCobertura.php" class="list-group-item">Alta de Cobertura </a>
                   <a href="cobertura/ViewInfoCobertura.php" class="list-group-item">Modificar - Eliminar Cobertura</a>
                  </div>
                </li>
                <li>
                  <a href="#fondo" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-credit-card"></i>Fondos  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="fondo">
                    <a href="fondos/altaFondo.php" class="list-group-item">Alta de Fondo </a>
                   <a href="fondos/ViewInfoFondos.php" class="list-group-item">Modificar - Eliminar Fondo</a>
                  </div>
                </li>
                <!-- <li>
                  <a href="#insti" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-tower"></i>Instituciones  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="insti">
                    <a href="instituciones/altaInstitucion.php" class="list-group-item">Alta de Institucion </a>
                    <a href="instituciones/ViewInfoInst.php" class="list-group-item">Modificar - Eliminar Institucion</a>
                  </div>
                </li> -->
                 <li>
                  <a href="#respo" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-user"></i>Responsables  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="respo">
                    <a href="responsables/altaResponsable.php" class="list-group-item">Alta de Responsable </a>
                  <a href="responsables/ViewInfoResp.php" class="list-group-item">Modificar - Eliminar Responsable</a>
                  </div>
                </li>
                <!-- <li> 
                  <a href="#area" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-tags"></i>Areas de Conocimiento  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="area">
                    <a href="areaConocimiento/altaAreaConocimiento.php" class="list-group-item">Alta de Area Conocimiento </a>
                    <a href="areaConocimiento/ViewInfoArea.php" class="list-group-item">Modificar - Eliminar Area Conocimiento</a>
                  </div>
                </li> -->
              </ul>
          </div>
          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Panel Principal</h3>
              </div>
              <div class="panel-body">
                <h1 style="text-align: center;">BIENVENIDO AL PANEL DE ADMINISTRACIÓN</h1>
                <h3 style="text-align: center;">PROYECTOS DE LA UNIVERSIDAD AUTÓNOMA DE TAMAULIPAS</h3>
                <h3 style="text-align: center;">Secretaria de Investigación de Posgrado</h3><br><br>
                <img class="espacio-imagen center-block"  src="../investiga_files/headerlogoUAT.png" style="width: 45%">
              </div><!-- panel body -->
            </div>
          </div><!-- content -->
        </div>
      </div>
    <!--footer-->
    <?php 
      include 'footer.php';
    ?>
    </div>

  </body>
</html>
