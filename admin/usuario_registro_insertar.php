<?php

	include("../conexion.php");

    //recibo las variables
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
	$usuario = $_POST["usuario"];
	$password = $_POST["password"];
		
    $sql = "INSERT INTO usuarios(`nombre`,`email`,`username`,`password`)
	VALUES ('".$nombre."','".$email."','".$usuario."','".$password."')";
    $result = mysql_query($sql) or die(mysql_error());
	header('Location: usuario_registro.php?desc='.$nombre);
	
?>
