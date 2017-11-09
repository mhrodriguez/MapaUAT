<?php
  //conexion a la base de datos
include_once "../Clases/Conexion.php";

  $_FILES['imagen']['name']; //este es el nombre del archivo que acabas de subir
  $_FILES['imagen']['type']; //este es el tipo de archivo que acabas de subir
  $_FILES['imagen']['tmp_name'];//este es donde esta almacenado el archivo que acabas de subir.
  $_FILES['imagen']['size']; //este es el tamaño en bytes que tiene el archivo que acabas de subir.
  $_FILES['imagen']['error']; //este almacena el codigo de error que resultaría en la subida.
  $NombreCobettura = $_POST['nombreC'];


//comprobamos si ha ocurrido un error.
if ($_FILES["imagen"]["error"] > 0){
	echo "ha ocurrido un error";
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 16384;//16384

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php 
		$ruta = "../../mapa/img/" .$_FILES['imagen']['name'];
		//comprovamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
			if ($resultado){
        $ruta = $_FILES['imagen']['name'];
//insertamos/guardamos el nombre de la imagen en la tabla.
        $ConexionBD = new Conexion();
  $InsertRuta = $ConexionBD -> prepare("INSERT INTO  COBERTURA(nombre, rutaMarcador) VALUES ('$NombreCobettura','img/$ruta') ");
  $InsertRuta->execute();
		echo "<script>";
	      echo "alert('COBERTURA REGISTRADA EXITOSAMENTE!!');";
	      echo "window.location = 'altaCobertura.php';";
        echo "</script>";
        
			} else {
				echo "ocurrio un error al mover el archivo.";
			}
		} else {
			echo $_FILES['imagen']['name'] . ", este archivo existe";
		}
	} else {
		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}


?>