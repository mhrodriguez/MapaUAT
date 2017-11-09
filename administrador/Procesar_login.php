<?php	
	include_once "ConexionBD.php";	

	session_start();//Inicia la sesion.
	session_unset();//Establece la sesion
	session_destroy();//Finaliza la sesion.
  
  //checamos que nuestra variables no esten vacias y si es hacia regresamos al login
  if(!isset($_POST['username']) || !isset($_POST['password']))
	{
		header('Location: login.php');
		exit();
	}
		 
	if (validarUsuario($_POST['username'], md5($_POST['password']))) {
		header('Location: index.php');
		exit();
	}
	else{
		header('Location: login.php');
		exit();
	}
     
  function validarUsuario($username, $password)
	{
		//conexion con la base de datos
		$ConexionBD = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
		$loginCorrecto= false;//variable para guardar el incio del login
    
		if(!$ConexionBD->connect_error){
			$ConsultaUsuarios = "SELECT * FROM Usuarios WHERE usuario = '$username'";
			$ResultadoQuery = $ConexionBD -> query($ConsultaUsuarios);
			
			if($usuario = $ResultadoQuery -> fetch_assoc()){
				if($usuario['password'] == $password){
					session_start();
					$_SESSION['usuarioId'] = $usuario['idUsuario'];
					$_SESSION['username'] = $usuario['usuario'];
					$_SESSION['nombre'] = $usuario['nombre'];
					$loginCorrecto = true;
				}
			}
			$ResultadoQuery -> free();
			$ConexionBD -> close();
		}
		return $loginCorrecto;
		
	}
?>