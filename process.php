<?php 
/*
	Recopilo los datos vía POST y proceso formulario de contacto
	Con strip_tags suprimo etiquetas HTML y php para evitar una posible inyección.
	Como no gestiona base de datos no es necesario limpiar de inyección SQL.
*/
$nombre = strip_tags($_POST['nombre']);
$email = strip_tags($_POST['email']);
$mensaje = strip_tags($_POST['mensaje']);
$fecha = time();
$fechaFormateada = date("j/n/Y", $fecha);

//cabecera del correo
$textoEmisor = "MIME-VERSION: 1.0\r\n";
$textoEmisor .= "Content-type: text/html; charset=UTF-8\r\n";
$textoEmisor .= "From: contacto@cecatel.cl";

//Correo de destino; donde se enviará el correo.
$correoDestino = "contacto@cecatel.cl";

//Formateo el asunto del correo
$asunto = "Contacto CECATEL WEB_".$nombre;
 
//Formateo el cuerpo del correo
$cuerpo = "<b>Enviado por:</b> " . $nombre . " a las " . $fechaFormateada . "<br />";
$cuerpo .= "<b>E-mail:</b> " . $email . "<br />";
$cuerpo .= "<b>Comentario:</b> " . $mensaje;

// Envío el mensaje
mail( $correoDestino, $asunto, $cuerpo, $textoEmisor);

echo "Su mensaje fue enviado correctamente, pronto nos pondremos en contacto.";

 ?>
