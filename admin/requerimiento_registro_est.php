<?php
	include("../conexion.php");

    //recibo las variables
    $id = $_GET["id"];
	$estado=$_GET["est"];
	
	if($estado == '1') { $estado = '0'; } 
	else { $estado = '1'; }
	
    $sql = "update requerimientos set `estado`='$estado' where `id`='$id'";
    $result = mysql_query($sql);
	header('Location: requerimiento_reporte.php?ans=est');
?>
