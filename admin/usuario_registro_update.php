<?php
	include("../conexion.php");

    //recibo las variables
    $id = $_POST["id"];
	$nombre=$_POST["nombre"];
	$email=$_POST["email"];
	$usuario=$_POST["usuario"];
	$password=$_POST["password"];
		
    $sql = "UPDATE usuarios SET `username`='$usuario',`email`='$email',`password`='$password',`nombre`='$nombre'
	where `id`='$id'";
    $result = mysql_query($sql) or die(mysql_error());
	header('Location: usuario_registro_upd.php?id='.$id.'&ans=yes');
		
		
?>
