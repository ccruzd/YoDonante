<?php
	session_start();
	unset($_SESSION["idusuario"]);
	unset($_SESSION["username"]);
	unset($_SESSION["permisos"]);
	/*session_destroy();*/

	header('Location: index.php'); //saltamos a login.php

?>
