alert("je");



function agregardatos(codArt,Descripcion,idTipoA,Stock,idUnidad,idDeposito,idEstant){

	cadena="&codArt=" + codArt + 
			"&Descripcion=" + Descripcion +
			"&idTipoA=" + idTipoA +
			"&Stock=" + Stock +
			"&idUnidad=" + idUnidad +
			"&idDeposito=" + idDeposito +
			"&idEstant=" + idEstant;

	$.ajax({
		type:"POST",
		url:"php/agregarDatos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				$('#buscador').load('componentes/buscador.php');
				alertify.success("Agregado con exito");
			}else{

				alertify.error("Fallo el servidor");
			}
		}
	});

}

function agregaform(datos){

	d=datos.split('||');

	$('#codArtu').val(d[0]);
	$('#Descripcionu').val(d[1]);
	$('#idTipoAu').val(d[2]);
	$('#Stocku').val(d[3]);
	$('#idUnidadu').val(d[4]);
	$('#idDepositou').val(d[5]);
	$('#idEstantu').val(d[6]);
	
}

function actualizaDatos(){


	codArt=$('#codArtu').val();
	Descripcion=$('#Descripcionu').val();
	idTipoA=$('#idTipoAu').val();
	Stock=$('#Stocku').val();
	idUnidad=$('#idUnidadu').val();
	idDeposito=$('#idDepositou').val();
	idEstant=$('#idEstantu').val();

	cadena="codArt=" + codArt + 
			"&Descripcion=" + Descripcion +
			"&idTipoA=" + idTipoA +
			"&Stock=" + Stock +
			"&idUnidad=" + idUnidad +
			"&idDeposito=" + idDeposito +
			"&idEstant=" + idEstant;

	$.ajax({
		type:"POST",
		url:"php/actualizaDatos.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function preguntarSiNo(codArt){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(codArt) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(codArt){

	cadena="codArt=" + codArt;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
			data:cadena,
			success:function(m){
				if(m==1){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Eliminado con exito!");
				}else{
					$('#tabla').load('componentes/tabla.php');
					alertify.error("Borrado Correctamente");
				}
			}
		});
}

