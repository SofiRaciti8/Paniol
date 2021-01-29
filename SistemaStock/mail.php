<?php  
	$des = 'sofiracitiii@gmail.com';
	$asunto = 'HOLA';
	$mensaje = 'COMO ESTAS';

	if(mail($des, $asunto, $mensaje)){
		echo'<script type="text/javascript">
    	alert("Mail enviado");
    	</script>';
	} 
	else {
		echo'<script type="text/javascript">
    	alert("Mail NO enviado");
    	</script>';
	}
?>
