<?php
	require_once ('../Clases/Conexion.php');//para llamar las clases en donde esta la conexion 
	require_once ('../Clases/Funciones.php');//para llamar a los metodos donde esta el insert
	//Se asigna el valor de la variable a los inputs
	$Nombre = $_POST['nombreAC'];
	// aquí paso los valores que tienen las variables anteriores al construtor de la clase usuarios para que relalice el  insert
	$Insert = new AreasConocimiento($Nombre);
	$Insert -> InsertAreasConocimiento();
	// muestra una alerta donde indica que el registro fue exitoso
	echo '<script language = "javascript" >';
	echo "alert('Registro Exitoso');";
	echo "window.location ='altaAreaConocimiento.php';";
	echo '</script>';
?>