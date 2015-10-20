<?php
	include("../conexion.php");

	session_start();
	$s_idcentro=$_SESSION["idcentro"];
	$s_idusuario=$_SESSION["idusuario"];
	$s_usuario=$_SESSION["username"];
	$s_nombre=$_SESSION["nombre"];
	$s_fecha=$_SESSION["fecha"];
	$s_permisos=$_SESSION["permisos"];
		
	
	if($s_idusuario==null)
		header("Location:../acceso/index.php");	
		
	$rsbuscar=mysql_query("select * from personal where username='$s_usuario'");
	$encontrado=mysql_fetch_array($rsbuscar);
	$foto=$encontrado["imagen"];
	
	$ans = "";
	if (isset($_GET["ans"])) {
		$ans = $_GET["ans"];
	}
	
	
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Control Panel</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABLES -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue fixed">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
				Control Panel
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                       
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $s_nombre ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/usuarios/<?php echo $foto ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $s_nombre ?>
                                        <small>Miembro desde el <?php echo date("d M. o", strtotime($s_fecha)) ?></small>
                                    </p>
                                </li>
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="perfil.php" class="btn btn-default btn-flat">Ver Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../acceso/logout.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/usuarios/<?php echo $foto ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hola, 
							<?php
							$nombre = explode(" ", $s_nombre);
							echo $nombre[0];
							?> </p>

                            <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
                        </div>
                    </div>
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> <span>Inicio</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Usuarios</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="usuario_registro.php"><i class="fa fa-angle-double-right"></i> Registro</a></li>
                                <li><a href="usuario_reporte.php"><i class="fa fa-angle-double-right"></i> Reporte</a></li>
                            </ul>
                        </li>
						<li>
                            <a href="centro.php">
                                <i class="fa fa-map-marker"></i> <span>Centro</span>
                            </a>
                        </li>
						<li class="treeview active">
                            <a href="#">
                                <i class="fa fa-tint"></i>
                                <span>Requerimientos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="requerimiento_registro.php"><i class="fa fa-angle-double-right"></i> Registro</a></li>
                                <li><a href="requerimiento_reporte.php"><i class="fa fa-angle-double-right"></i> Reporte</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Requerimientos
                        <small>Reporte</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Requerimientos</li>
                        <li class="active">Reporte</li>
                    </ol>
                </section>

                <!-- Main content -->
               <section class="content">
					<div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Reporte</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
												<th>Fecha Registro</th>
												<th>Código</th>
												<th>Unidades</th>
												<th>Tipo de Sangre</th>
												<th>Usuario</th>
                                                <th>Donantes</th>
												<th>Estado</th>
                                                <th style="width: 110px">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$query = "SELECT R.id, R.idcentro, R.tiposangre, R.unidades, R.fecha, R.idusuario, R.notas, R.codigo, R.estado, C.nombre as nombrecentro, P.username, C.distrito  
												FROM requerimientos as R
												inner join centros as C on C.id = R.idcentro
												inner join personal as P on P.id = R.idusuario
												where R.idcentro = '$s_idcentro'";	
										
											$rs = mysql_query($query);
											while($rsconsulta = mysql_fetch_array($rs)) {
												$tiposangre = $rsconsulta['tiposangre'];
												$distrito = $rsconsulta['distrito'];
										?>
                                            <tr>
												<td><?php echo $newDate = date("d/m/Y h:i", strtotime($rsconsulta['fecha']));?></td>
												<td><?php echo $rsconsulta['codigo'] ?></td>
												<td><?php echo $rsconsulta['unidades'] ?></td>
												<td><?php echo $rsconsulta['tiposangre'] ?></td>
												<td><?php echo $rsconsulta['username'] ?></td>
												
												<?php
												if($tiposangre == "AB +"){
													$query = "SELECT COUNT(*) as count  FROM donantes as D 
													WHERE D.ciudad = '$distrito'";
												}
												if($tiposangre == "AB -"){
													$query = "SELECT COUNT(*) as count  FROM donantes as D 
													WHERE D.ciudad = '$distrito' and D.tiposangre = 'AB -' or D.ciudad = '$distrito' and D.tiposangre = 'A -' or D.ciudad = '$distrito' and D.tiposangre = 'B -' or D.ciudad = '$distrito' and D.tiposangre = 'O -'";
												}
												if($tiposangre == "A +"){
													$query = "SELECT COUNT(*) as count  FROM donantes as D 
													WHERE D.ciudad = '$distrito' and D.tiposangre = 'A +' or D.ciudad = '$distrito' and D.tiposangre = 'A -' or D.ciudad = '$distrito' and D.tiposangre = 'O +' or D.ciudad = '$distrito' and D.tiposangre = 'O -'";
												}
												if($tiposangre == "A -"){
													$query = "SELECT COUNT(*) as count  FROM donantes as D 
													WHERE D.ciudad = '$distrito' and D.tiposangre = 'A -' or D.ciudad = '$distrito' and D.tiposangre = 'O -'";
												}
												if($tiposangre == "B +"){
													$query = "SELECT COUNT(*) as count  FROM donantes as D 
													WHERE D.ciudad = '$distrito' and D.tiposangre = 'B +' or D.ciudad = '$distrito' and D.tiposangre = 'B -' or D.ciudad = '$distrito' and D.tiposangre = 'O +' or D.ciudad = '$distrito' and D.tiposangre = 'O -'";
												}
												if($tiposangre == "B -"){
													$query = "SELECT COUNT(*) as count  FROM donantes as D 
													WHERE D.ciudad = '$distrito' and D.tiposangre = 'B -' or D.ciudad = '$distrito' and D.tiposangre = 'O -'";
												}
												if($tiposangre == "O +"){
													$query = "SELECT COUNT(*) as count  FROM donantes as D 
													WHERE D.ciudad = '$distrito' and D.tiposangre = 'O +' or D.ciudad = '$distrito' and D.tiposangre = 'O -'";
												}
												if($tiposangre == "O -"){
													$query = "SELECT COUNT(*) as count  FROM donantes as D 
													WHERE D.ciudad = '$distrito' and D.tiposangre = 'O -'";
												} 
												$rs1 = mysql_query($query);
												$row = mysql_fetch_array($rs1);
												?>
												<td><?php echo $row['count'] ?></td>
												<td><?php if ($rsconsulta['estado']=="1") { ?>
													<span class="label label-success">Activo</span>
													<?php } else { ?>
													<span class="label label-danger">Inactivo</span>
													<?php } ?>
												</td>
                                                <td>
												<!--<a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal<?php echo $rsconsulta['id'] ?>"><i class="fa fa-desktop"></i></a>-->
												<div class="btn-group" align="right">
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#compose-modal<?php echo $rsconsulta['id'] ?>"><i class="fa fa-desktop"></i> &nbsp;Ver</button>
													<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span>
													</button>
													<ul class="dropdown-menu" role="menu">
														<li><a href="requerimiento_registro_upd.php?id=<?php echo $rsconsulta['id'] ?>"><i class="fa fa-pencil"></i>Modificar</a></li>
														<li><a href="requerimiento_registro_est.php?id=<?php echo $rsconsulta['id'].'&est='.$rsconsulta['estado'] ?>">
															<?php if ($rsconsulta['estado']=="1") { ?>
															<i class="fa fa-minus-circle"></i> Desactivar
															<?php } else { ?>
															<i class="fa fa-check-circle"></i> Activar
															<?php } ?>
															</a>
														</li>
														<li class="divider"></li>
														<li><a href="requerimiento_enviar_email.php?id=<?php echo $rsconsulta['id'] ?>"><i class="fa fa-envelope-o"></i>Enviar Emails</a></li>
														<li><a href="requerimiento_enviar_textos.php?id=<?php echo $rsconsulta['id'] ?>"><i class="fa fa-comment-o"></i>Enviar Textos</a></li>
													</ul>
												</div>
                                            </tr>
											<!-- COMPOSE MESSAGE MODAL 
											<div class="modal fade" id="compose-modal<?php echo $rsconsulta['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 class="modal-title"><i class="fa fa-user"></i> <?php echo $rsconsulta['paterno']." ".$rsconsulta['materno'].", ".$rsconsulta['nombre']; ?></h4>
														</div>
														<div class="modal-body">
															<div class="row invoice-info">
																<div class="col-sm-6 invoice-col">
																	Nacimiento: <b><?php echo $newDate = date("d-M-Y", strtotime($rsconsulta['fecnac']));?></b><br/>
																	<b><?php if($rsconsulta['nacido']!="") { echo $rsconsulta['nacido']; } else { echo "< Lugar No registrado >";} ?></b><br/>
																</div>
																<div class="col-sm-4 invoice-col">
																	Bautizo: <b><?php echo $newDate = date("d-M-Y", strtotime($rsconsulta['fecbautizo']));?></b><br/>
																	<b><?php if($rsconsulta['lugarbautizo']!="") { echo $rsconsulta['lugarbautizo']; } else { echo "< Lugar No registrado >";} ?></b>
																</div>
															</div>
															<br>
															<div class="row">
																<div class="col-xs-12">
																	<h2 class="page-header">
																		<i class="fa fa-users"></i> Padres y Padrinos
																	</h2>
																</div>
															</div>
															<div class="row invoice-info">
																<div class="col-sm-10">
																	Padre: <b><?php 
																	if($rsconsulta['ape_padre']!="") { echo $rsconsulta['ape_padre'].""; } else { echo "< Apellido No registrado >";} 
																	if($rsconsulta['nom_padre']!="") { echo ", ".$rsconsulta['nom_padre']." ("; } else { echo "< Nombre No registrado >";} 
																	if($rsconsulta['lugar_padre']!="") { echo $rsconsulta['lugar_padre'].") "; } else { echo "< Lugar No registrado >)";} ?>
																	</b><br/>
																	Madre: <b><?php 
																	if($rsconsulta['ape_madre']!="") { echo $rsconsulta['ape_madre'].""; } else { echo "< Apellido No registrado >";} 
																	if($rsconsulta['nom_madre']!="") { echo ", ".$rsconsulta['nom_madre']." ("; } else { echo "< Nombre No registrado >";} 
																	if($rsconsulta['lugar_madre']!="") { echo $rsconsulta['lugar_madre'].") "; } else { echo "< Lugar No registrado >)";} ?>
																	</b><br/>
																</div>
															</div>
															<br>
															<div class="row invoice-info">
																<div class="col-sm-10">
																	Padrino: <b><?php 
																	if($rsconsulta['ape_padrino']!="") { echo $rsconsulta['ape_padrino'].""; } else { echo "< Apellido No registrado >";} 
																	if($rsconsulta['nom_padrino']!="") { echo ", ".$rsconsulta['nom_padrino']; } else { echo "< Nombre No registrado >";} ?>
																	</b><br/>
																	Madrina: <b><?php 
																	if($rsconsulta['ape_madrina']!="") { echo $rsconsulta['ape_madrina'].""; } else { echo "< Apellido No registrado >";} 
																	if($rsconsulta['nom_madrina']!="") { echo ", ".$rsconsulta['nom_madrina']; } else { echo "< Nombre No registrado >";} ?>
																	</b><br/>
																</div>
															</div>
															<br>
															<div class="row">
																<div class="col-xs-12">
																	<h2 class="page-header">
																		<i class="fa fa-info"></i> Otros Datos
																	</h2>
																</div>
															</div>
															<div class="row invoice-info">
																<div class="col-sm-6 invoice-col">
																	Libro: <b><?php if($rsconsulta['libro']!="") { echo $rsconsulta['libro']; } else { echo "< No registrado >";} ?></b><br/>
																</div>
																<div class="col-sm-4 invoice-col">
																	Partida: <b><?php if($rsconsulta['partida']!="") { echo $rsconsulta['partida']; } else { echo "< No registrado >";} ?></b><br/>
																</div>
															</div>
															<div class="row invoice-info">
																<div class="col-sm-10">
																	Sacerdote: <b><?php echo $rsconsulta['sacerdote'] ?></b><br/>
																</div>
															</div>
															<br>
															<div class="row">
																<div class="col-xs-12">
																	<h2 class="page-header">
																		<i class="fa fa-book"></i> Notas
																	</h2>
																</div>
															</div>
															<div class="row invoice-info">
																<div class="col-sm-10">
																	<b><?php if($rsconsulta['notas']!="") { echo $rsconsulta['notas']; } else { echo "< No existes notas >";} ?></b>
																</div>
															</div>
														</div>
														<div class="modal-footer clearfix">
															<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-sign-out"></i> Salir</button>
															<a href="../pdf/reporte/bautizo.php?id=<?php echo $rsconsulta['id'] ?>" target="_blank" >
															<button type="button" class="btn btn-primary pull-left"><i class="fa fa-file-o"></i> &nbsp;Ver Reporte</button></a>
															<a href="bautizo_registro_upd.php?id=<?php echo $rsconsulta['id'] ?>" target="_blank" >
															<button type="button" class="btn btn-warning pull-left espacio5left"><i class="fa fa-pencil"></i> &nbsp;Modificar</button></a>
														</div>
													</div>
												</div>
											</div><!-- /.modal -->
										<?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Fecha Registro</th>
												<th>Código</th>
												<th>Unidades</th>
												<th>Tipo de Sangre</th>
												<th>Usuario</th>
                                                <th>Estado</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>	

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
        <script src="js/jquery.min.js"></script>
      	<script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
		<!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
		
		<script type="text/javascript">
            $(function() {
                $('#example1').dataTable({
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false,
                });
            });
        </script>
		<?php if($ans == "email") { ?>
		<div class="alerta">
			<div class="alert alert-success alert-dismissable">
				<i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Alerta!</b> Email's enviando con Éxito
            </div>
		</div>
		<?php } ?>
    </body>
</html>