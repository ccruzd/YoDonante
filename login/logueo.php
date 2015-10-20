<?php
include("../conexion.php");

$username=$_POST['username'];
$password=$_POST['password'];
	
	$rsbuscar="select * from usuarios where username='".mysql_real_escape_string($username)."' 
	and password='".mysql_real_escape_string($password)."' or email='".mysql_real_escape_string($email)."' 
	and password='".mysql_real_escape_string($password)."'";
    $buscado=mysql_query($rsbuscar);	
	$encontrado=mysql_fetch_array($buscado);
	
	$exito=$encontrado["estado"];
	$exito=(int)$exito;		
	
	if($exito==1){
		session_start();
		$_SESSION["idusuario"]=$encontrado["id"];
		$_SESSION["username"]=$encontrado["username"];
		$_SESSION["nombre"]=$encontrado["nombre"];
		$_SESSION["fecha"]=$encontrado["fecha"];
		$_SESSION["permisos"]=$encontrado["permisos"];	
		
		header('Location:../cpanel/index.php');
	}
	else
		header('Location: index.php?Er=1');
		
?>