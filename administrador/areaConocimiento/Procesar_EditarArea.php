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
  $Nombre = $_POST['nombreAC'];

  $ConexionBD = new Conexion();
  $Update = $ConexionBD -> prepare("UPDATE area_conocimiento SET nombre='$Nombre' WHERE id='$Id' ");

  if($Update->execute()){
    echo '<script language="javascript">';
    echo 'swal({
            title: "Registro Actualizado Correctamente",
            text: "La Informacion de Area de Conocimiento fue Actualizada!",
            type: "success",
          }).then(function() {
					  window.location ="ViewInfoArea.php";
				}).done()';
    echo '</script>';
  }else{
    echo '<script language="javascript">';
    echo 'swal({
            title: "ERROR AL ACTUALIZAR",
            text: "Algo Salio Mal al Intentar Actualizar la Informacion!",
            type: "error",
          }).then(function() {
					  window.location ="ViewInfoArea.php";
				})';
    echo '</script>';
  }
?>