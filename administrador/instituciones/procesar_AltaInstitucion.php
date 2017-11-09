<?php
	require_once ('../Clases/Conexion.php');//para llamar las clases en donde esta la conexion 
	require_once ('../Clases/Funciones.php');//para llamar a los metodos donde esta el insert
	//Se asigna el valor de la variable a los inputs
	$Nombre = $_POST['nombreI'];//las variables donde se almacenan los datos que traje de los input mediante el metodo POSt el cual sirve para enviar los datos de forma segura

	// aquí paso los valores que tienen las variables anteriores al construtor de la clase usuarios para que relalice el  insert
	$Insert = new Instituciones($Nombre);
	$Insert -> InsertInstituciones();
	// muestra una alerta donde indica que el registro fue exitoso
	echo '<script language = "javascript" >';
	echo "alert('Registro Exitoso');";
	echo "window.location ='altaInstitucion.php';";
	echo '</script>';
?>