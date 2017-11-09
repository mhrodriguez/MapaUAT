<?php
	include_once "../Clases/Conexion.php";

	$ConexionBD = new Conexion();
	$select ="SELECT * FROM FONDO";

	echo "<option value=''>Selecciona el Fondo</option>";
	foreach($ConexionBD -> query($select) as $resultado){
		echo "<option value='".$resultado['id']."'>";
		echo $resultado['nombre'];
		echo "</option>";
	}
?>