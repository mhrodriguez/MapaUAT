<!DOCTYPE html>
<html>
  <head>
    <!--Archivos de SweetAlert-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/5.3.2/sweetalert2.css">
		<script type="text/javascript" src="https://cdn.jsdelivr.net/sweetalert2/5.3.2/sweetalert2.min.js"></script>
  </head>
  <body>
    
  </body>
</html>
<?php
  include_once "../Clases/Conexion.php";

    $Id = $_GET['id'];
    $NumeroP = $_POST['numP'];
    $TituloP = $_POST['tituloP'];
	 $AInicioP = $_POST['aInicioP'];
	 $AFinP = $_POST['aFinP'];
	 $MontoAutoP = $_POST['mAutorizadoP'];
	 $MontoEmpresaP = $_POST['mEmpresaP'];
	 $MontoExternoP = $_POST['mExternoP'];
	 //$IdResponsable = $_POST['idRespo'];
	 //$IdEstatus = $_POST['idEsta'];
	 //$IdCobe = $_POST['idCobe'];
	 //$IdFondo = $_POST['idFon'];
	// $IdTerritorio= $_POST['idTerri'];

  $ConexionBD = new Conexion();
  $Update = $ConexionBD -> prepare("UPDATE PROYECTO SET Id='$NumeroP',nombre='$TituloP', anioInicio='$AInicioP', anioFin='$AFinP', montoUATAutorizado='$MontoAutoP', montoEmpresa='$MontoEmpresaP', montoExterno='$MontoExternoP' WHERE Id='$Id' ");

  if($Update->execute()){
    echo '<script language="javascript">';
    echo 'swal({
            title: "Registro Actualizado Correctamente",
            text: "La Informacion del Territorio fue Actualizada!",
            type: "success",
          }).then(function() {
					  window.location ="ViewInfoProyectos.php";
				}).done()';
    echo '</script>';
  }else{
    echo '<script language="javascript">';
    echo 'swal({
            title: "ERROR AL ACTUALIZAR",
            text: "Algo Salio Mal al Intentar Actualizar la Informacion!",
            type: "error",
          }).then(function() {
					  window.location ="ViewInfoTerritorios.php";
				})';
    echo '</script>';
  }
?>
