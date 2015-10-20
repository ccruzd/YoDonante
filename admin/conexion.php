<?php
$cn=mysql_connect("localhost","smartact_smart","135246")or die("Error en Conexion");
$db=mysql_select_db("smartact_donar")or die("Error en Db");
return($cn);
return($db);
?>