<?php 
  include_once "../Clases/Conexion.php";

  $ConexionBD = new Conexion();
  $select ="SELECT id,full_name FROM RESPONSABLE";

  echo "<option value=''>Selecciona un Responsable</option>";
  foreach($ConexionBD -> query($select) as $resultado){

    echo "<option value='".$resultado['id']."'>";
    echo $resultado['full_name'];
    echo "</option>";
  }
?>