<?php

	include("../conexion.php");

    //recibo las variables
    $idcentro = $_POST["idcentro"];
    $idusuario = $_POST["idusuario"];
    $tiposangre = $_POST["tiposangre"];
    $unidades = $_POST["unidades"];
	$notas = strtoupper($_POST["notas"]);
	
	$length = 6;
	$code = substr(str_shuffle(md5(time())),0,$length);
		
    $sql = "INSERT INTO requerimientos(`idcentro`,`idusuario`,`tiposangre`,`unidades`,`notas`,`codigo`)
	VALUES ('".$idcentro."','".$idusuario."','".$tiposangre."','".$unidades."','".$notas."','".$code."')";
    $result = mysql_query($sql) or die(mysql_error());
	header('Location: requerimiento_registro.php?ans=yes');
	
?>
