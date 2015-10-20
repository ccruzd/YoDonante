<?php
	include("conexion.php");

    $nombres = strtoupper ($_POST["nombres"]);
    $apellidos = strtoupper ($_POST["apellidos"]);
    $dni = strtoupper ($_POST["dni"]);
    $tiposangre = strtoupper ($_POST["tiposangre"]);
    $celular = strtoupper ($_POST["celular"]);
    $email = strtoupper ($_POST["email"]);
    $ubicacion = strtoupper ($_POST["ubicacion"]);
    $ciudad = strtoupper ($_POST["ciudad"]);
	$departamento = strtoupper ($_POST["departamento"]);
	$pais = strtoupper ($_POST["pais"]);
	$sexo = strtoupper ($_POST["sexo"]);
	$fecnac = strtoupper ($_POST["fecnac"]);
	
	
	$sql = "INSERT INTO donantes(`nombres`,`apellidos`,`dni`,`tiposangre`,`celular`,`email`,`ubicacion`,`ciudad`,`departamento`,`pais`,`sexo`,`fecnac`)
	VALUES ('".$nombres."','".$apellidos."','".$dni."','".$tiposangre."','".$celular."','".$email."','".$ubicacion."','".$ciudad."','".$departamento."','".$pais."','".$sexo."','".$fecnac."')";
    $result = mysql_query($sql) or die(mysql_error());
	
	

	// ENVIAR POR EMAIL ---------------------------------------------------------------------
	$message = "";
	
	$message .= '<html><body>';
	$message .= '<h4>Gracias por registrarte en YoDonante</h4>';
	$message .= '<table border="0" rules="all" style="border-color: #fff;" cellpadding="2">';
	$message .= "<tr><td><strong>NOMBRE: </strong> </td><td>" .$nombres.", ".$apellidos. "</td></tr>";
	$message .= "<tr><td><strong>TIPO DE SANGRE: </strong> </td><td>" .$tiposangre. "</td></tr>";
	$message .= "<tr><td><strong>CELULAR: </strong> </td><td>" .$celular. "</td></tr>";
	$message .= "<tr><td><strong>EMAIL: </strong> </td><td>" .$email. "</td></tr>";
	$message .= "<tr><td><strong>UBICACIÓN: </strong> </td><td>" .$ubicacion. "</td></tr>";
	$message .= "<tr><td><strong>FECHA DE NACIMIENTO: </strong> </td><td>" .date('d-m-Y', strtotime($fecnac)). "</td></tr>";
	$message .= "</table><br>";
	
	
	
	$query = "SELECT nombre, direccion, horario, telefono FROM `centros` WHERE distrito = '$ciudad' and bancosangre='1'";
	$rs = mysql_query($query);
	$count = mysql_num_rows($rs);
	
	if($count > 0) {
		$message .= "<h4>Recuerde que los siguientes establecimientos de salud cuentan con Banco de Sangre, donde puede acercarse a donar en los horarios de atención</h4>";
	}
	
	while($rsconsulta = mysql_fetch_array($rs)) {
	
	$nombre = $rsconsulta['nombre'];
	$direccion = $rsconsulta['direccion'];
	$horario = $rsconsulta['horario'];
	$telefono = $rsconsulta['telefono'];
	
	$message .= '<table border="0" rules="all" style="border-color: #fff;" cellpadding="2">';
	$message .= "<tr><td><strong>CENTRO: &nbsp;&nbsp;&nbsp;</strong> </td><td>" .$nombre. "</td></tr>";
	$message .= "<tr><td><strong>DIRECCIÓN: &nbsp;&nbsp;&nbsp;</strong> </td><td>" .$direccion. "</td></tr>";
	$message .= "<tr><td><strong>HORARIO: &nbsp;&nbsp;&nbsp;</strong> </td><td>" .$horario. "</td></tr>";
	$message .= "<tr><td><strong>TELÉFONO: &nbsp;&nbsp;&nbsp;</strong> </td><td>" .$telefono. "</td></tr>";

	$message .= "</table><br>";
	}
	
	$message .= "</body></html>";
	
	
	$to = $email;
	$subject = "YoDonante | Registro";
	$from = "info@smartactionperu.com";
	
	$headers = "";
	$headers .= "From:" .$from. "\r\n";
	$headers .= "Reply-To: ".strtolower($email). "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	
	mail($to,$subject,$message,$headers); // correo enviado
	
	header('Location: index.php?ans=ok');

?>
