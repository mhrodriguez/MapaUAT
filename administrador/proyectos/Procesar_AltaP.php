<?php
   include_once "../Clases/Conexion.php";
  
	$NumeroP = $_POST['NumeroPro'];
 	 $NombreP = $_POST['NombrePro'];
	 $AInicioP = $_POST['AInicioPro'];
	 $AFinP = $_POST['AFinPro'];
	 $MontoAutoP = $_POST['MAutoPro'];
	 $MontoEmpresaP = $_POST['MEmpresaPro'];
	 $MontoExternoP = $_POST['MExtePro'];
	 $IdResponsable = $_POST['RespoPro'];
	 $IdEstatus = $_POST['EstatusPro'];
	 $IdCobe = $_POST['CoberturaPro'];
	 $IdFondo = $_POST['FondoPro'];
	 $IdTerritorio= $_POST['TerriPro'];
	 $IdAreaConocimiento = $_POST['AreaConPro'];
	 
	 $ConexionBD = new Conexion();
	 
	 /*$InsertProyecto = $ConexionBD->prepare("INSERT INTO proyecto(idFondo,numeroProyecto,nombre,idResponsable,montoUATAutorizado,montoEmpresa,montoExterno,anioInicio,anioFin,idEstatus,idCobertura) VALUES ('$IdFondo','$NumeroP','$NombreP','$IdResponsable','$MontoAutoP','$MontoEmpresaP','$MontoExternoP','$AInicioP','$AFinP','$IdEstatus','$IdCobe')");*/
	 $InsertProyecto = $ConexionBD->prepare("INSERT INTO PROYECTO(Id,idFondo,nombre,idResponsable,montoUATAutorizado,montoEmpresa,montoExterno,anioInicio,anioFin,idEstatus,idCobertura) VALUES('$NumeroP','$IdFondo','$NombreP','$IdResponsable','$MontoAutoP','$MontoEmpresaP','$MontoExternoP','$AInicioP','$AFinP','$IdEstatus','$IdCobe')");

	 
	if($InsertProyecto->execute()==TRUE){
		 
		$SelectIdTerritorio = $ConexionBD -> prepare("SELECT MAX(Id) as idT FROM PROYECTO");
		$SelectIdTerritorio->execute();
    
		while($Datos = $SelectIdTerritorio -> fetch()){
      		$ultimoIdT = $Datos['idT'];
    	}
		
		$InsertProyecto_Territorio = $ConexionBD->prepare("INSERT INTO PROYECTO_TERRITORIO(idProyecto,idTerritorio) VALUES ('$ultimoIdT','$IdTerritorio')");
		$InsertProyecto_Territorio->execute();

		$InsertArea = $ConexionBD->prepare("INSERT INTO PROYECTO_AREA (idProyecto, idArea) VALUES ('$ultimoIdT','$IdAreaConocimiento')");
		$InsertArea->execute();
		
		echo "1";
	}else{
	 	echo "2";
  }
?>