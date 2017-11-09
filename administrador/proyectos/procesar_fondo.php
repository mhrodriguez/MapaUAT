<?php 
	include_once "../Clases/Conexion.php";
	$ConexionBD = new Conexion();

	$NombreFondo = $_POST['NombreFondo'];
	$Insert =  $ConexionBD->prepare("INSERT INTO FONDO(nombre) VALUES('$NombreFondo')");


  	if ($Insert->execute() == true) {
  		echo "1";
  	}
  	else{
  		echo "2";
  	}

?>