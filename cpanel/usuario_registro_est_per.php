<?php
	include("../conexion.php");

    //recibo las variables
    $id = $_GET["id"];
	$permisos=$_GET["per"];
	
	if($permisos == '1') { $permisos = '0'; } 
	else { $permisos = '1'; }
	
    $sql = "update usuarios set `permisos`='$permisos' where `id`='$id'";
    $result = mysql_query($sql);
	header('Location: usuario_reporte.php?ans=per');
?>
