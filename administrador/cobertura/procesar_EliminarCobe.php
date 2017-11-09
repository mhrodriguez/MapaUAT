<?php
  include_once "../Clases/Conexion.php";
  $ConexionBD = new Conexion();
  $Opcion = $_POST['opcion'];
  $Id = $_POST['id'];

  if($Opcion==1){
    $Eliminar = $ConexionBD ->prepare("DELETE FROM COBERTURA WHERE id = $Id");
    $Eliminar->execute();
  }
?>