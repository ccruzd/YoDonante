<?php

	include("../conexion.php");

    //recibo las variables
    $centro = $_POST["centro"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
	$usuario = $_POST["usuario"];
	$password = $_POST["password"];
	
    $sql = "INSERT INTO personal(`idcentro`,`nombre`,`email`,`username`,`password`)
	VALUES ('".$centro."','".$nombre."','".$email."','".$usuario."','".$password."')";
    $result = mysql_query($sql) or die(mysql_error());
	header('Location: personal_registro.php?desc='.$nombre);
	
?>
