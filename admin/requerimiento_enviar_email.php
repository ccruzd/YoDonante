<?php
	include("../conexion.php");

    $idreq = $_GET["id"];
	
	$rsbuscar=mysql_query("SELECT R.idcentro, R.tiposangre, R.unidades, R.fecha, R.codigo, C.nombre as nombrecentro, C.distrito, C.direccion, C.telefono
	FROM requerimientos as R 
	inner join centros as C on C.id = R.idcentro
	where R.id = '$idreq'");
	$encontrado=mysql_fetch_array($rsbuscar);
	$distrito=$encontrado["distrito"];
	$unidades=$encontrado["unidades"];
	$tiposangre=$encontrado["tiposangre"];
	$codigo=$encontrado["codigo"];
	$fecha=$encontrado["fecha"];
	$nombrecentro=$encontrado["nombrecentro"];
	$direccion=$encontrado["direccion"];
	$telefono=$encontrado["telefono"];
	

	
	if($tiposangre == "AB +"){
		$query = "SELECT D.nombres, D.email FROM donantes as D 
		WHERE D.ciudad = '$distrito'";
	}
	if($tiposangre == "AB -"){
		$query = "SELECT D.nombres, D.email FROM donantes as D 
		WHERE D.ciudad = '$distrito' and D.tiposangre = 'AB -' or D.ciudad = '$distrito' and D.tiposangre = 'A -' or D.ciudad = '$distrito' and D.tiposangre = 'B -' or D.ciudad = '$distrito' and D.tiposangre = 'O -'";
	}
	if($tiposangre == "A +"){
		$query = "SELECT D.nombres, D.email FROM donantes as D 
		WHERE D.ciudad = '$distrito' and D.tiposangre = 'A +' or D.ciudad = '$distrito' and D.tiposangre = 'A -' or D.ciudad = '$distrito' and D.tiposangre = 'O +' or D.ciudad = '$distrito' and D.tiposangre = 'O -'";
	}
	if($tiposangre == "A -"){
		$query = "SELECT D.nombres, D.email FROM donantes as D 
		WHERE D.ciudad = '$distrito' and D.tiposangre = 'A -' or D.ciudad = '$distrito' and D.tiposangre = 'O -'";
	}
	if($tiposangre == "B +"){
		$query = "SELECT D.nombres, D.email FROM donantes as D 
		WHERE D.ciudad = '$distrito' and D.tiposangre = 'B +' or D.ciudad = '$distrito' and D.tiposangre = 'B -' or D.ciudad = '$distrito' and D.tiposangre = 'O +' or D.ciudad = '$distrito' and D.tiposangre = 'O -'";
	}
	if($tiposangre == "B -"){
		$query = "SELECT D.nombres, D.email FROM donantes as D 
		WHERE D.ciudad = '$distrito' and D.tiposangre = 'B -' or D.ciudad = '$distrito' and D.tiposangre = 'O -'";
	}
	if($tiposangre == "O +"){
		$query = "SELECT D.nombres, D.email FROM donantes as D 
		WHERE D.ciudad = '$distrito' and D.tiposangre = 'O +' or D.ciudad = '$distrito' and D.tiposangre = 'O -'";
	}
	if($tiposangre == "O -"){
		$query = "SELECT D.nombres, D.email FROM donantes as D 
		WHERE D.ciudad = '$distrito' and D.tiposangre = 'O -'";
	}
	
	$rs = mysql_query($query);
	while($rsconsulta = mysql_fetch_array($rs)) {
		$nombres = $rsconsulta["nombres"];
		$email = strtolower($rsconsulta["email"]);
		
	// ENVIAR POR EMAIL ---------------------------------------------------------------------
	
	
	$message = "";
	
	$message .= '<html><body>';
	
	$message .= "Hola " .$nombres.",";
	$message .= "<br><br>";
	$message .= "Se necesita con urgencia ".$unidades;
	if($unidades == '1'){
		$message .= " unidad de sangre de tipo ";
	} else {
		$message .= " unidades de sangre de tipo ";
	}
	
	if($tiposangre == "AB +"){
		$message .= "AB+ u AB- u A+ u A- u B+ u B- u O+ u O-";
	}
	if($tiposangre == "AB -"){
		$message .= "AB- u A- u B- u O-";
	}
	if($tiposangre == "A +"){
		$message .= "A+ u A- u O+ u O-";
	}
	if($tiposangre == "A -"){
		$message .= "A- u O-";
	}
	if($tiposangre == "B +"){
		$message .= "B+ u B- u O+ u O-";
	}
	if($tiposangre == "B -"){
		$message .= "B- u O-";
	}
	if($tiposangre == "O +"){
		$message .= "O+ u O-";
	}
	if($tiposangre == "O -"){
		$message .= "O-";
	}
	
	$message .= " en el centro de Salud ".$nombrecentro;
	$message .= " ubicado en ".$direccion."<br><br>";
	$message .= " El Código de Donación es: <strong>".$codigo."</strong><br>";
	$message .= " Ver mayor detalle en el siguiente <a href='http://www.smartactionperu.com/yodonante/donar.php?id=".$idreq."' target='_blank'> enlace</a><br><br>";
	$message .= " Puedes comunicarte a: ".$telefono."<br><br>";
	$message .= '<table border="0" rules="all" style="border-color: #fff;" cellpadding="2">';
	$message .= "<tr><td><strong>'CON UNA SOLA DONACIÓN SE PUEDEN SALVAR 3 VIDAS'</strong> </td><td></td></tr>";
	$message .= "</table><br>";
	$message .= "</body></html>";
	
	
	$to = $email;
	$subject = "YoDonante | Se Necesita Donante";
	$from = "info@smartactionperu.com";
	
	$headers = "";
	$headers .= "From:" .$from. "\r\n";
	$headers .= "Reply-To: ".strtolower($email). "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	
	mail($to,$subject,$message,$headers); // correo enviado
	
	}
	header('Location: requerimiento_reporte.php?ans=email');

?>
