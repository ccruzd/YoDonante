<?php
	include("../conexion.php");

	session_start();
	$s_idusuario=$_SESSION["idusuario"];
	$s_usuario=$_SESSION["username"];
	$s_nombre=$_SESSION["nombre"];
	$s_fecha=$_SESSION["fecha"];
	$s_permisos=$_SESSION["permisos"];
		
	
	if($s_idusuario==null)
		header("Location:../login/index.php");	
		
	$rsbuscar=mysql_query("select * from usuarios where username='$s_usuario'");
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
    <body class="skin-blue">
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
                                        <a href="../login/logout.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
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
                        <li class="treeview active">
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
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-map-marker"></i>
                                <span>Centros</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="centro_reporte.php"><i class="fa fa-angle-double-right"></i> Reporte</a></li>
                            </ul>
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-user-md"></i>
                                <span>Personal</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="personal_registro.php"><i class="fa fa-angle-double-right"></i> Registro</a></li>
                                <li><a href="personal_reporte.php"><i class="fa fa-angle-double-right"></i> Reporte</a></li>
                            </ul>
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-tint"></i>
                                <span>Requerimientos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="requerimiento_reporte.php"><i class="fa fa-angle-double-right"></i> Reporte</a></li>
                            </ul>
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-desktop"></i>
                                <span>Web</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="estadisticas.php"><i class="fa fa-angle-double-right"></i> Estadísticas</a></li>
                                <li><a href="colaboradores.php"><i class="fa fa-angle-double-right"></i> Colaboradores</a></li>
                            </ul>
                        </li>
						<li>
                            <a href="contacto_reporte.php">
                                <i class="fa fa-envelope"></i> <span>Contacto</span>
                            </a>
                        </li>
                    </ul>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Usuarios
                        <small>Reporte</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Usuarios</li>
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
												<th>Nombre</th>
                                                <th>Usuario</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Registro</th>
												<th>Permisos</th>
                                                <th>Estado</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$query = "SELECT * FROM usuarios order by fecha asc";
											$rs = mysql_query($query);
											while($rsconsulta = mysql_fetch_array($rs)) {
										?>
                                            <tr>
												<td><?php echo $rsconsulta['nombre'] ?></td>
                                                <td><?php echo $rsconsulta['username'] ?></td>
                                                <td><?php echo $rsconsulta['email'] ?></td>
                                                <td><?php echo $rsconsulta['password'] ?></td>
                                                <td><?php echo $rsconsulta['fecha'] ?></td>
												<td><?php if ($rsconsulta['permisos']=="1") { ?>
													<span class="label label-primary">Admin</span>
													<?php } else { ?>
													<span class="label label-info">Editor</span>
													<?php } ?>
												</td>
												<td><?php if ($rsconsulta['estado']=="1") { ?>
													<span class="label label-success">Activo</span>
													<?php } else { ?>
													<span class="label label-danger">Inactivo</span>
													<?php } ?>
												</td>
                                                <td>
													<div class="btn-group" align="right">
													<?php if ($s_idusuario != $rsconsulta['id']) { ?>
														<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown""><i class="fa fa-gears"></i> &nbsp;Acción</button>
														<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
															<span class="caret"></span>
															<span class="sr-only">Toggle Dropdown</span>
														</button>
														<ul class="dropdown-menu" role="menu">
															<li><a href="usuario_registro_upd.php?id=<?php echo $rsconsulta['id'] ?>"><i class="fa fa-pencil"></i>Modificar</a></li>
															<li><a href="usuario_registro_est.php?id=<?php echo $rsconsulta['id'].'&est='.$rsconsulta['estado'] ?>">
															<?php if ($rsconsulta['estado']=="1") { ?>
															<i class="fa fa-minus-circle"></i> Desactivar
															<?php } else { ?>
															<i class="fa fa-check-circle"></i> Activar
															<?php } ?>
															</a></li>
															<li><a href="usuario_registro_est_per.php?id=<?php echo $rsconsulta['id'].'&per='.$rsconsulta['permisos'] ?>">
															<?php if ($rsconsulta['permisos']=="1") { ?>
															<i class="fa fa-star-o"></i> Editor
															<?php } else { ?>
															<i class="fa fa-star"></i> Admin
															<?php } ?>
															</a></li>
														</ul>
													<?php } else { ?>
														<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown""><i class="fa fa-ban"></i> &nbsp;Acción</button>
														<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
															<span class="caret"></span>
															<span class="sr-only">Toggle Dropdown</span>
														</button>
													<?php }  ?>	
													</div>
												</td>
                                            </tr>
										<?php } ?>
                                        </tbody>
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
		<?php if($ans == "est") { ?>
		<div class="alerta">
			<div class="alert alert-success alert-dismissable">
				<i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Alerta!</b> Estado cambiado
            </div>
		</div>
		<?php } ?>
		<?php if($ans == "per") { ?>
		<div class="alerta">
			<div class="alert alert-success alert-dismissable">
				<i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Alerta!</b> Permiso cambiado
            </div>
		</div>
		<?php } ?>
    </body>
</html>