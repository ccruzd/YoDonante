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
		
	$rsbuscar=mysql_query("select P.imagen, C.nombre as nombrecentro 
		from personal as P 
		inner join centros as C on C.id = P.idcentro
		where username='$s_usuario'");
	$encontrado=mysql_fetch_array($rsbuscar);
	$foto=$encontrado["imagen"];
	
	
	$rs=mysql_query("SELECT * FROM centros where id='$s_idcentro'");
	$row=mysql_fetch_array($rs);
	
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
                        Centro
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					<div class="row">
						<div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                </div><!-- /.box-header -->	
                                <div class="box-body">
								<div class="row">
									<div class="col-xs-12">
										<h2 class="page-header">
										<i class="fa fa-map-marker"></i> &nbsp;&nbsp;<?php echo $row["nombre"]; ?>
										</h2>
									</div>
								</div>
								Clasificación: <b><?php echo $row["clasificacion"]; ?></b><br>
								Tipo: <b><?php echo $row["tipo"]; ?></b><br>
								Unidad Ejecutora: <b><?php echo $row["unidejecutora"]; ?></b><br>
								Categoria: <b><?php echo $row["categoria"]; ?></b><br>
								<br>
								<div class="row">
									<div class="col-xs-12">
										<h2 class="page-header">
										<i class="fa fa-bookmark"></i> &nbsp;&nbsp;Ubicación
										</h2>
									</div>
								</div>
								Departamento: <b><?php echo $row["departamento"]; ?></b><br>
								Distrito: <b><?php echo $row["distrito"]; ?></b><br>
								Ubigeo: <b><?php echo $row["ubigeo"]; ?></b><br>
								Dirección: <b><?php echo $row["direccion"]; ?></b><br>
								
								<br>
								<div class="row">
									<div class="col-xs-12">
										<h2 class="page-header">
										<i class="fa fa-info"></i> &nbsp;&nbsp;Información
										</h2>
									</div>
								</div>
								Horario: <b><?php echo $row["horario"]; ?></b><br>
								Teléfono: <b><?php echo $row["telefono"]; ?></b><br>
								Responsable: <b><?php echo $row["responsable"]; ?></b><br>
								Condición: <b><?php echo $row["condicion"]; ?></b><br>
                            </div> 
                            </div><!-- /.box -->                            
						</div><!-- /.col -->
						<div class="col-md-6">
						<form action="centro_imagen_upd.php" method="post" enctype="multipart/form-data">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Imagen</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="../resources/images/centros/<?php echo $row["imagen"]; ?>" alt="First slide" width="60%" height="260px">
                                            </div>
                                        </div>
                                    </div><br>
									<input name="imagen" type="file" />
                                </div><!-- /.box-body --><br>
								<input name="id" type="hidden" value="<?php echo $row['id']; ?>" >	
								<div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div><!-- /.box -->
						</form>	 
                        </div><!-- /.col -->
					</div><!-- /.row -->
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
                    "bPaginate": false,
                    "bLengthChange": true,
                    "bFilter": false,
                    "bSort": false,
                    "bInfo": false,
                    "bAutoWidth": false,
                });
            });
        </script>
		
		<?php if($ans != "") { ?>
		<div class="alerta">
			<div class="alert alert-success alert-dismissable">
				<i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Alerta!</b> Imagen cambiada por Éxito
            </div>
		</div>
		<?php } ?>

    </body>

	</html>