<?php
	include("../conexion.php");

    //recibo las variables
    $id = $_POST["id"];
	$nameimagen= "imagen".$id.".jpg";
	// echo $_FILES['imagen']['tmp_name'];
	
	
	// mover la imagen del directorio
	$rutaEnServidor='../resources/images/centros';
	$rutaTemporal=$_FILES['imagen']['tmp_name'];
	$nombreImagen=$_FILES['imagen']['name'];
	$rutaDestino=$rutaEnServidor.'/'.$nameimagen;
	move_uploaded_file($rutaTemporal,$rutaDestino);
	
	
	
    $sql = "UPDATE centros SET `imagen` = '$nameimagen'
	where `id`='$id'";
    $result = mysql_query($sql) or die(mysql_error());
	header('Location: centro.php?ans=yes');
	
		
?>
