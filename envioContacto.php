<?php
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$mensaje = $_POST['mensaje'];

        $correoCopia = "alejandroreyna@outlook.com";

	/* Destino y Asunto del mensaje a enviar */
	$destino = "Esteban.kuh@gmail.com";
	$destinoCopia = "Esteban.kuh@gmail.com"; //mdoming@uady.mx
	$asunto = "Contacto Tienda Web eComic";

	/* Formato del mensaje a enviar */
	$cuerpo = "<strong>Nombre: </strong>".$nombre."<br />
			   <strong>Correo: </strong>".$correo."<br />
			   <strong>Mensaje: </strong>".$mensaje;

	/* Cabeceras del mensaje a enviar */
	$cabecera = "MIME-Version: 1.0\r\n";
	$cabecera .= "Content-type:text/html; charset=iso-8859-1\r\n";
	$cabecera .= "From: $correo\r\n";
	$cabecera .= "Reply-to: $correo\r\n";
	$cabecera .= "Cc: $correo\r\n";
	$cabecera .= "Bcc: $correoCopia\r\n";

//	if(mail($destino.",".$destinoCopia, $asunto, $cuerpo, $cabecera)) {
//		echo 'Su mensaje ha sido enviado. Gracias por su mensaje.';
//	}
//	else {
//		echo 'No se pudo enviar el mensaje. Int&eacute;ntelo nuevamente';
//	}

$to = "esteban.kuh@gmail.com";
$subject = "eComic";
$txt = "Correo de prueba del formulario de Contacto";
$headers = "From: support@ecomic.comxa.com" . "\r\n" .
            "CC: leonardolizarraga1@gmail.com" . "\r\n".
            "BCC: alejandroreyna.c@outlook.com";

mail($to,$subject,$txt,$headers);



?>
