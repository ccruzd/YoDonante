<?php
include("../conexion.php");

$error=null;
if (isset($_GET["Er"])){ 
	$error = $_GET["Er"]; }

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login y Registro para CV online" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Hugthetech" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />

		<script>
        function validar() {
			ingreso1 = this.form.passwordsignup.value
			ingreso2 = this.form.passwordsignup_confirm.value
			if (ingreso1!=ingreso2) {
                alert("Los Passwords no coinciden.");
                this.form.passwordsignup_confirm.focus();
                return false;
            }
        }
		<?php if (isset($_POST["usernamesignup"])) 
			{ ?>
			location.href="#toregister";
		<?php } ?>
		</script>	
		
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <a href="">
                    <strong>&laquo; ver todos los Proyectos: </strong>
                </a>
                <span class="right">
                    <a href="../index.php">
                        <strong>IR A YO DONANTE WEB</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header><br>
                <h1>Panel de control</h1>
				<!--<nav class="codrops-demos">
					<span>Click <strong>"Join us"</strong> to see the form switch</span>
					<a href="index.html">Demo 1</a>
					<a href="index2.html">Demo 2</a>
					<a href="index3.html" class="current-demo">Demo 3</a>
				</nav>-->
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="logueo.php" autocomplete="on" method="post"> 
                                <h1>YO DONANTE</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" >Email o Username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="ej. X8df!90E" /> 
                                </p>
                                <br>
                                <p class="login button"> 
                                    <input type="submit" value="Acceder" /> 
								</p>
                                <p class="change_link">
									<?php if (isset($error)){ ?>
									Usuario o Password incorrectos | YO DONANTE &#169;
									<?php } else {?>
									YO DONANTE &#169; 
									<?php } ?>
								</p>
                            </form>
                        </div>
						
                    </div><br>
                </div>  
            </section>
        </div>
		<div class="fixed">
			<div class="fb-like" data-href="https://www.facebook.com/HugTheTech" data-send="false" data-layout="box_count" data-width="450" data-show-faces="false"></div>
		</div>
    </body>
</html>