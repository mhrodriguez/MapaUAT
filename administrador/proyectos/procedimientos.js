function NewResponsable(){

	NombreRespo = document.getElementById("nombreR").value;

	$.ajax({
		type:'POST',
		url:"procesar_procedimientos.php",
		data: {NombreRespo:NombreRespo},
		success: function(respuesta){
			if (respuesta == 1) {
				swal('Registro Exitoso!',
			'El Nuevo Responsable a Sido Registrado Exitosamente',
			'success');
				$('#myModal').modal('hide');
				
			}
			else{
				swal('Error en el Registro!',
			'No se Pudo Realizar el Registro, Intentalo de Nuevo',
			'error')
			}
			
		},
		error: function (xhr, ajaxOptions, thrownError) {
	        alert(xhr.status);
	        alert(thrownError);
	    }
	});
	
}

function NewFondo(){

	NombreFondo = document.getElementById("nombreF").value;

	$.ajax({
		type:'POST',
		url:"procesar_fondo.php",
		data: {NombreFondo:NombreFondo},
		success: function(respuesta){
			if (respuesta == 1) {
				swal('Registro Exitoso!',
			'El Nuevo Fondo a Sido Registrado Exitosamente',
			'success');
				$('#myModal2').modal('hide');
				
			}
			else{
				swal('Error en el Registro!',
			'No se Pudo Realizar el Registro, Intentalo de Nuevo',
			'error')
			}
			
		},
		error: function (xhr, ajaxOptions, thrownError) {
	        alert(xhr.status);
	        alert(thrownError);
	    }
	});
	
}

function CargarResponsables(){
    $.ajax({
        url:'Cargar_Respo.php',
        success:function(resp){
            $('#idRespo').html(resp);
        }
    });
}

function CargarFondos(){
    $.ajax({
        url:'Carga_Fondo.php',
        success:function(resp){
            $('#idFon').html(resp);
        }
    });
}

function LimpiarInputRespo(){
	document.getElementById("nombreR").value = "";
}

function LimpiarInputFondo(){
	document.getElementById("nombreF").value = "";
}

function RegistrarProyecto(){
	var NumeroPro = document.getElementById("numP").value;
	var NombrePro = document.getElementById("tituloP").value;
	var AInicioPro = document.getElementById("aInicioP").value;
	var AFinPro = document.getElementById("aFinP").value;
	var MAutoPro = document.getElementById("mAutorizadoP").value;
	var MEmpresaPro = document.getElementById("mEmpresaP").value;
	var MExtePro = document.getElementById("mExternoP").value;
	var RespoPro = document.getElementById("idRespo").value;
	var EstatusPro = document.getElementById("idEsta").value;
	var CoberturaPro = document.getElementById("idCobe").value;
	var FondoPro = document.getElementById("idFon").value;
	var TerriPro = document.getElementById("idTerri").value;
	var AreaConPro = document.getElementById("idAre").value;

	if (NombrePro == "") {
		swal('Nombre Proyecto Requerido!','Ingresa una Nombre de Proyecto Valido','info');
	}
	else if (AInicioPro == "") {
		swal('Año de Inicio Requerido!','Ingresa la Fecha de Inicio del Proyecto','info');
	}
	else if (MAutoPro == "") {
		swal('Monto Autorizado Requerido!','Ingresa el Monto Autorizado','info');
	}
	else if (RespoPro == "") {
		swal('Responsable Requerido!','Ingresa el Responsable del Proyecto','info');
	}
	else if (EstatusPro == "") {
		swal('Estatus Requerido!','Ingresa el Estatus del Proyecto','info');
	}
	else if (CoberturaPro == "") {
		swal('Cobertura Requerida!','Ingresa la Cobertura del Proyecto','info');
	}
	else if (FondoPro == "") {
		swal('Fondo Requerido!','Ingresa el Fondo del Proyecto','info');
	}
	else if (TerriPro == "") {
		swal('Territorio Requerido!','Ingresa el Territorio del Proyecto','info');
	}
	else if (AreaConPro == "") {
		swal('Area de Conocimiento Requerida!','Ingresa el Area de Conocimiento del Proyecto','info');
	}
	else{
		$.ajax({
		type:'POST',
		url:"Procesar_AltaP.php",
		data: {NumeroPro:NumeroPro,NombrePro:NombrePro,AInicioPro:AInicioPro,AFinPro:AFinPro,MAutoPro:MAutoPro,
			MEmpresaPro:MEmpresaPro,MExtePro:MExtePro,RespoPro:RespoPro,EstatusPro:EstatusPro,CoberturaPro:CoberturaPro,
			FondoPro:FondoPro,TerriPro:TerriPro,AreaConPro:AreaConPro},
		success: function(respuesta){
			if (respuesta == 1) {
				swal('Registro Exitoso!',
			'El Proyecto a Sido Registrado Exitosamente',
			'success').then(function() {
					  window.location ="altaProyectos.php";
				}).done();
			}
			else{
				swal('Error en el Registro!',
			'No se Pudo Realizar el Registro, Intentalo de Nuevo',
			'error')
			}
			
		},
		error: function (xhr, ajaxOptions, thrownError) {
	        alert(xhr.status);
	        alert(thrownError);
	    }
	});
	}
}

/*$("#prueba1").on('onmouseover', function(){
	alert("si entro");
});*/
$(document).ready(function() {
	$("#cargaR").mouseenter(function(){
		$('#idRespo').load("Cargar_Respo.php");
	});

	$("#cargaF").mouseenter(function(){
		$('#idFon').load("Carga_Fondo.php");
	});
});