<?php 
	include_once "../Clases/Conexion.php";
	$ConexionBD = new Conexion();

	$NombreRespo = $_POST['NombreRespo'];
	$Insert =  $ConexionBD->prepare("INSERT INTO RESPONSABLE(full_name) VALUES('$NombreRespo')");


  	if ($Insert->execute() == true) {
  		echo "1";
  	}
  	else{
  		echo "2";
  	}

?>