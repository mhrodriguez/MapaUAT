<?php
	require_once ('../Clases/Conexion.php');//para llamar las clases en donde esta la conexion 
	require_once ('../Clases/Funciones.php');//para llamar a los metodos donde esta el insert
	//Se asigna el valor de la variable a los inputs
	$Nombre = $_POST['nombreT'];
  	$Latitud = $_POST['latitudT'];
  	$Longitud = $_POST['longitudT'];
	// aquí paso los valores que tienen las variables anteriores al construtor de la clase usuarios para que relalice el  insert
	$Insert = new Territorios($Nombre,$Latitud, $Longitud);
	$Insert -> InsertTerritorios();
	// muestra una alerta donde indica que el registro fue exitoso
	echo '<script language = "javascript" >';
	echo "alert('Registro Exitoso');";
	echo "window.location ='altaTerritorio.php';";
	echo '</script>';
?>