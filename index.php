<?php
	include("conexion.php");
	
	$ans = "";
	if (isset($_GET["ans"])) {
		$ans = $_GET["ans"];
	}
	if($ans == "ok"){
		echo '<script type="text/javascript">alert("Muchas Gracias por ayudarnos a salvar vidas. Por favor revisa tu correo")</script>';
	}
	
	$result = mysql_query("SELECT COUNT(*) AS total FROM donantes;");
	$data= mysql_fetch_assoc($result);
	$num_donantes = $data['total'];
	
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Yo Donante</title>

<link href="resources/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="resources/js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link href="resources/css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:200,300,600,400,700,900' rel='stylesheet' type='text/css'>
<!--- banner Slider starts Here --->
<script src="resources/js/responsiveslides.min.js"></script>
 <script>
    // You can also use "$(window).load(function() {"
    $(function () {
      // Slideshow 4
      $("#slider4").responsiveSlides({
        auto: true,
        pager: true,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        before: function () {
          $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
          $('.events').append("<li>after event fired.</li>");
        }
      });

    });
  </script>
<!----//End-slider-script---->
<script type="text/javascript" src="resources/js/jquery.mixitup.min.js"></script>
<script type="text/javascript">
$(function () {
	
	var filterList = {
	
		init: function () {
		
			// MixItUp plugin
			// http://mixitup.io
			$('#portfoliolist').mixitup({
				targetSelector: '.portfolio',
				filterSelector: '.filter',
				effects: ['fade'],
				easing: 'snap',
				// call the hover effect
				onMixEnd: filterList.hoverEffect()
			});				
		
		},
		
		hoverEffect: function () {
		
			// Simple parallax effect
			$('#portfoliolist .portfolio').hover(
				function () {
					$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
					$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
				},
				function () {
					$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
					$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
				}		
			);				
		
		}

	};
	
	// Run the show!
	filterList.init();
	
	
});	
</script>
<script type="text/javascript" src="resources/js/move-top.js"></script>
<script type="text/javascript" src="resources/js/easing.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".scroll").click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
	});
});
</script>
 
<!-- Source modal-->

	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
			<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
			<!-- Add Button helper (this is optional) -->
			<link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
			<script type="text/javascript" src="source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
			<!-- Add Media helper (this is optional) -->
			<script type="text/javascript" src="source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
			<script type="text/javascript">
				$('.fancybox-buttons').fancybox({
					openEffect  : 'none',
					closeEffect : 'none',

					prevEffect : 'none',
					nextEffect : 'none',

					closeBtn  : false,

					helpers : {
						title : {
							type : 'inside'
						},
						buttons	: {}
					},

					afterLoad : function() {
						this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
					}
				});
				
				/*
				 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
				*/
				$('.fancybox-media')
					.attr('rel', 'media-gallery')
					.fancybox({
						openEffect : 'none',
						closeEffect : 'none',
						prevEffect : 'none',
						nextEffect : 'none',

						arrows : false,
						helpers : {
							media : {},
							buttons : {}
						}
					});
				$(document).ready(function() {
					$(".various").fancybox({
						maxWidth	: 800,
						maxHeight	: 600,
						fitToView	: false,
						width		: '70%',
						height		: '70%',
						autoSize	: false,
						closeClick	: false,
						openEffect	: 'none',
						closeEffect	: 'none'
					});
				});
	</script>
	
	<script type="text/javascript">
	function validacion() {
		if(!document.getElementById('terminos').checked){
				alert('No ha aceptado los Términos y Condiciones');
				return false;
			};
	};
	</script>	
</head>
<body>
<!-- Header Starts Here -->
		<div class="header" id="home">
			<div class="container">
				<div class="logo">
					<a href="index.php"><img src="resources/images/logo.png" alt=""/></a>
				</div>
				<span class="menu" onclick="valor();"></span>
				<div class="clears"></div>
				<div class="navigation">
					<ul class="navig">
						<li><a href="#about" class="scroll"><i class="settings"></i><p>Que hacemos</p><div class="clears"></div></a></li>
						<li class="naa"><a href="#case" class="scroll"><i class="like"></i><p>Casos</p><div class="clears"></div></a></li>
						<li class="nab"><a href="#registro" class="scroll"><i class="message"></i><p>Registro</p><div class="clears"></div></a></li>
						<li class="nac"><a href="#contact" class="scroll"><i class="send"></i><p>Contacto</p><div class="clears"></div></a></li>
					</ul>
				</div>
				<script>
					$( "span.menu" ).click(function() {
					  $( ".navigation" ).slideToggle( "slow", function() {
					    // Animation complete.
					  });
					});
				</script>
				<div class="clearfix"></div>
			</div>
		</div>
	<!-- Header Ends Here --> 
	<!-- Banner Starts Here -->
	<div class="banner">
		<div class="container">
		<!-- Slideshow 4 -->
		    <div  id="top" class="callbacks_container">
		      <ul class="rslides" id="slider4">
			        <li>
			        	<div class="row banner-row">
							<div class="col-md-6 banner-column">
<!-- 								<img src="resources/images/hand.png" alt="" /> -->
							</div>
							<div class="col-md-6 banner-column ban_cl">
								<p>Donar sangre es regalar vida.</p>
								<h1>ENCUENTRA TU DONANTE</h1>
								<div class="ban-but">
									<a href="busca.php" > AHORA </a>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>
<!-- 					<li> -->
<!-- 			        	<div class="row banner-row"> -->
<!-- 							<div class="col-md-6 banner-column"> -->
<!-- 								<img src="resources/images/hand1.png" alt="" /> -->
<!-- 							</div> -->
<!-- 							<div class="col-md-6 banner-column ban_cl"> -->
<!-- 								<h1>Lorem Ipsum</h1> -->
<!-- 								<p>simply dummy text of the printing and typesetting industry.</p> -->
<!-- 								<div class="ban-but"> -->
<!-- 									<a href="#">about Us</a> -->
<!-- 									<a href="#" class="active">Contacts</a> -->
<!-- 								</div> -->
<!-- 							</div> -->
<!-- 							<div class="clearfix"></div> -->
<!-- 						</div> -->
<!-- 					</li> -->
					
				</ul>
			</div>
			<!-- End Of Slider -->
		</div>
	</div>
	<!-- Banner Ends Here -->
	<!-- About US Starts Here -->
	<div class="about" id="about">
		<div class="container">
			<h3 class="top-head">QUÉ HACEMOS</h3>
			<span class="line">
				<span class="sub-line"></span>
			</span>
			<p>	Nuestra Aplicación YoDonante ayudará a ubicar donantes voluntarios compatibles utilizando un sistema de ubicación. 
			Toda pesona voluntaria podrá registrarse y así formar parte de una red social que permitirá a comunicar a los posibles donantes 
			con los receptores</p>
			<div class="row about-row">
				<div class="col-md-3 about-column">
					<i><img src="resources/images/p1.jpg" alt="" class="wt"/></i>
					<h4  class="wtt">Regístrate</h4>
					<p>Registra tus datos de contacto.</p>
				</div>
				<div class="col-md-3 about-column">
					<i><img src="resources/images/p2.jpg" alt=""/></i>
					<h4>Entérate</h4>
					<p>En caso de una emergencia se te contactará.</p>
				</div>
				<div class="col-md-3 about-column">
					<i><img src="resources/images/p3.jpg" alt=""/></i>
					<h4>Dona</h4>
					<p>Así ayudarás a salvar vidas.</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="but_all"><a href="about.php">Leer más</a></div>
		</div>
	</div>
	<!-- About US Ends Here -->
	<!-- Blockquote Starts Here -->
	<div class="cots-row">
		<div class="container">
			<blockquote>
				<h4>Con una sola Donación</h4>
				<p>Se pueden salvar 3 vidas</p>
				<p class="cot_2">La cantidad donada representa el 10% de la sangre que normalmente se posee, 
				porcentaje que no interfiere con el funcionamiento normal del organismo.</p>
				
			</blockquote>
					
		</div>
	</div>
	<!-- Blockquote Ends Here -->
	<!-- Blog Starts Here -->
	<div class="blog" id="case">
		<div class="container">
			<h3 class="top-head">Casos de Urgencia</h3>
			<span class="line">
				<span class="sub-line"></span>
			</span>
			<p>Encuentra tu donante AHORA</p>
			
			<ul id="filters" class="clearfix">
				<li><span class="filter active" data-filter="a b ab o">TODOS</span></li>
				<li><span class="filter" data-filter="a">A</span></li>
				<li><span class="filter" data-filter="b">B</span></li>
				<li><span class="filter" data-filter="ab">AB</span></li>
				<li><span class="filter" data-filter="o">O</span></li>
			</ul>
			<div class="blog-top-grid">
			<div id="portfoliolist">
			<?php
			$query = "SELECT R.id, R.idcentro, R.tiposangre, R.unidades, R.fecha, R.idusuario, R.notas, R.codigo, R.estado, C.nombre as nombrecentro, C.imagen, C.distrito, C.departamento  
				FROM requerimientos as R
				inner join centros as C on C.id = R.idcentro";	
		
			$rs = mysql_query($query);
			while($row = mysql_fetch_array($rs)) {
			?>
				<a href="donar.php?id=<?php echo $row["id"]; ?>">
				<div class="portfolio blog-grid 
				<?php if($row["tiposangre"] == "A +" || $row["tiposangre"] == "A -") { ?>a<?php } ?>
				<?php if($row["tiposangre"] == "B +" || $row["tiposangre"] == "B -") { ?>b<?php } ?>
				<?php if($row["tiposangre"] == "AB +" || $row["tiposangre"] == "AB -") { ?>ab<?php } ?>
				<?php if($row["tiposangre"] == "O +" || $row["tiposangre"] == "O -") { ?>o<?php } ?>
				" 
				<?php if($row["tiposangre"] == "A +" || $row["tiposangre"] == "A -") { ?>
				data-cat="a" 
				<?php } ?>
				<?php if($row["tiposangre"] == "B +" || $row["tiposangre"] == "B -") { ?>
				data-cat="b" 
				<?php } ?>
				<?php if($row["tiposangre"] == "AB +" || $row["tiposangre"] == "AB -") { ?>
				data-cat="ab" 
				<?php } ?>
				<?php if($row["tiposangre"] == "O +" || $row["tiposangre"] == "O -") { ?>
				data-cat="o" 
				<?php } ?> >
				
					<div class="blog-date 
						<?php if($row["tiposangre"] == "A +" || $row["tiposangre"] == "A -") { ?><?php } ?>
						<?php if($row["tiposangre"] == "B +" || $row["tiposangre"] == "B -") { ?>d_c_2<?php } ?>
						<?php if($row["tiposangre"] == "AB +" || $row["tiposangre"] == "AB -") { ?>d_c_3<?php } ?>
						<?php if($row["tiposangre"] == "O +" || $row["tiposangre"] == "O -") { ?>d_c_4<?php } ?>
					">
						<i 
						<?php if($row["tiposangre"] == "A +" || $row["tiposangre"] == "A -") { ?>class="bl_a"<?php } ?>
						<?php if($row["tiposangre"] == "B +" || $row["tiposangre"] == "B -") { ?>class="bl_b"<?php } ?>
						<?php if($row["tiposangre"] == "AB +" || $row["tiposangre"] == "AB -") { ?>class="bl_c"<?php } ?>
						<?php if($row["tiposangre"] == "O +" || $row["tiposangre"] == "O -") { ?>class="bl_d"<?php } ?>
						></i>
						<div class="d_a_t">
							<p><?php echo date("d", strtotime($row['fecha']));?></p>
							<small><?php echo strtoupper(date("M Y", strtotime($row['fecha'])));?></small>
						</div>
					</div>
					<div class="blog-img">
						<img src="resources/images/centros/<?php echo $row['imagen'] ?>" class="img-responsive" alt="" />
					</div>
					<div class="clearfix"></div>
					<div class="blog-desc">
						<h4>Se necesita <?php echo $row["unidades"]; ?>
						<?php if($row["unidades"] == '1'){ ?>
							unidad
						<?php } else { ?>
							unidades
						<?php } ?>
						de Sangre <?php echo $row["tiposangre"]; ?></h4>
						<p><?php echo $row["nombrecentro"]; ?> (<?php echo $row["departamento"].", ".$row["distrito"]; ?>)</p>
					</div>
				</div>
				</a>
			<?php } ?>
			<!--
				
				<div class="portfolio blog-grid a" data-cat="a" >
					<div class="blog-date">
						<i class="bl_a"></i>
						<div class="d_a_t">
							<p>07</p>
							<small>ENE 2014</small>
						</div>
					</div>
					<div class="blog-img">
						<img src="resources/images/bl_1.jpg" class="img-responsive" alt="" />
					</div>
					<div class="clearfix"></div>
					<div class="blog-desc">
						<h4>Se necesitan 2 Unidades de Sangre A+</h4>
						<p>Clínica Virgen del Pilar (Trujillo - La Libertad - Perú)</p>
					</div>
				</div>
				
				<div class="portfolio blog-grid b" data-cat="b" >
					<div class="blog-date d_c_2">
						<i class="bl_b"></i>
						<div class="d_a_t">
							<p>06</p>
							<small>ENE 2014</small>
						</div>
					</div>
					<div class="blog-img">
						<img src="resources/images/bl_2.jpg" class="img-responsive" alt="" />
					</div>
					<div class="clearfix"></div>
					<div class="blog-desc">
						<h4>Se necesitan 2 Unidades de Sangre B+</h4>
						<p>Clínica Sánchez Ferrer  (Trujillo - La Libertad - Perú)</p>
					</div>
				</div>
				
				<div class="portfolio blog-grid ab" data-cat="ab" >
					<div class="blog-date d_c_3">
						<i class="bl_c"></i>
						<div class="d_a_t">
							<p>05</p>
							<small>ENE 2014</small>
						</div>
					</div>
					<div class="blog-img">
						<img src="resources/images/bl_3.jpg" class="img-responsive" alt="" />
					</div>
					<div class="clearfix"></div>
					<div class="blog-desc">
						<h4>Se necesita 1 Unidad de Sangre AB-</h4>
						<p>Centro de Asistencia: Clínica Zegarra (Trujillo - La Libertad - Perú)</p>
					</div>
				</div>
				
				<div class="portfolio blog-grid a" data-cat="a" >
					<div class="blog-date">
						<i class="bl_a"></i>
						<div class="d_a_t">
							<p>04</p>
							<small>ENE 2014</small>
						</div>
					</div>
					<div class="blog-img">
						<img src="resources/images/bl_4.jpg" class="img-responsive" alt="" />
					</div>
					<div class="clearfix"></div>
					<div class="blog-desc">
						<h4>Se necesitan 3 Unidades de Sangre A-</h4>
						<p>Centro de Asistencia: Clínica Internacional (Trujillo - La Libertad - Perú)</p>
					</div>
				</div>
				
				<div class="portfolio blog-grid ab" data-cat="ab" >
					<div class="blog-date d_c_3">
						<i class="bl_c"></i>
						<div class="d_a_t">
							<p>03</p>
							<small>ENE 2014</small>
						</div>
					</div>
					<div class="blog-img">
						<img src="resources/images/bl_5.jpg" class="img-responsive" alt="" />
					</div>
					<div class="clearfix"></div>
					<div class="blog-desc">
						<h4>Se necesitan 2 Unidades de Sangre AB+</h4>
						<p>Centro de Asistencia: Hospital Belén(Trujillo - La Libertad - Perú)</p>
					</div>
				</div>
				
				<div class="portfolio blog-grid o" data-cat="o" >
					<div class="blog-date d_c_4">
						<i class="bl_d"></i>
						<div class="d_a_t">
							<p>02</p>
							<small>ENE 2015</small>
						</div>
					</div>
					<div class="blog-img">
						<img src="resources/images/bl_6.jpg" class="img-responsive" alt="" />
					</div>
					<div class="clearfix"></div>
					<div class="blog-desc">
						<h4>Se necesita 1 Unidad de Sangre O-</h4>
						<p>Hospital Victor Larco Herrera (Trujillo - La Libertad - Perú)</p>
					</div>
				</div>
				 -->
				
				<div class="clearfix"></div>
			</div>
			<!-- <div class="but_all"><a href="#">Ver más resultados</a></div> -->
			</div>
		</div>
	</div>
	<!-- Blog Ends Here -->
	<!-- Avance inicia -->
	<div class="cots-row">
		<div class="container">
			<div class="row fun-row">
				<div class="col-md-3 fun-column">
					<div class="fun-facts-div">
						<i class="code"></i>
						<div class="fun-right">
							<p><?php echo $num_donantes; ?></p>
							<h4>Donantes Registrados</h4>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-3 fun-column">
					<div class="fun-facts-div">
						<i class="pizza"></i>
						<div class="fun-right">
							<p>51</p>
							<h4>Unidades de Sangre</h4>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-3 fun-column">
					<div class="fun-facts-div">
						<i class="project"></i>
						<div class="fun-right">
							<p>70%</p>
							<h4>Ver Metas Cumplidas</h4>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- Avance End -->
	<!-- Contact Starts Here -->
	<div class="contact" id="registro">
			
			<h3 class="top-head">Registrate</h3>
			<span class="line">
				<span class="sub-line"></span>
			</span>
			
			<div class="container">
				<div class="contact-box">
					<form action="insertardonador.php" method="post" onsubmit="return validacion()" >
						<div class="text">
							<input type="text" name="nombres" placeholder="NOMBRES" required maxlength="60" />
							<input type="text" name="apellidos" placeholder="APELLIDOS" required maxlength="60"/>
							<input type="text" name="dni" class="text-1" placeholder="DNI" required maxlength="8"/>
						</div>
						<hr></hr>
						<div class="text">
							<select name="tiposangre">
							  <option>TIPO DE SANGRE</option>
							  <option>O -</option>
							  <option>O +</option>
							  <option>A -</option>
							  <option>A +</option>
							  <option>B -</option>
							  <option>B +</option>
							  <option>AB -</option>
							  <option>AB +</option>
							</select>
							<input type="text" name="celular" placeholder="CELULAR" required maxlength="9"/>
							<input type="email" name="email" class="text-1" placeholder="EMAIL" required maxlength="60"/>
						</div>
						<hr></hr>	
						
						<div class="text">
							 <input type="text" id="autocomplete" placeholder="UBICACIÓN" name="ubicacion" onFocus="geolocate()" maxlength="80"></input>
							 <input type="hidden" class="field" id="locality" name="ciudad" disabled="true"></input>
							 <input type="hidden" class="field" id="administrative_area_level_1" name="departamento"  disabled="true"></input>
							 <input type="hidden" class="field" id="country" name="pais"  disabled="true"></input>
							<select name="sexo">
							  <option>SEXO</option>
							  <option>MASCULINO</option>
							  <option>FEMENINO</option>
							</select>
								
							<input type="date" name="fecnac" placeholder="FECHA NACIMIENTO" required />
						</div>
						<hr></hr>
						
						
						</span><br>
						<input type="checkbox" name="acepto" id="terminos" value="1"> Estoy dispuesto a donar mi sangre voluntariamente y de forma gratuita. Ver <a class="various fancybox.ajax" href="terminos1.html"><b>Terminos y Condiciones</b></a></input>
						<br></br>

						
						<div class="text">
							<input type="submit" value="Enviar" />
						</div>
					</form>
				</div>
			</div>
	</div>
	<!-- Clients Starts Here -->
	<div class="clients">
		<div class="container">
			<h3 class="top-head w_hd">Colaboradores</h3>
			<span class="line">
				<span class="sub-line"></span>
			</span>
			<div class="client-row">
				<div class="cl-img">
					<img src="resources/images/cl-1.png" alt=""/>
				</div>
				<div class="cl-img">
					<img src="resources/images/cl-2.png" alt=""/>
				</div>
				<div class="cl-img">
					<img src="resources/images/cl-3.png" alt=""/>
				</div>
				<div class="cl-img cl1-img">
					<img src="resources/images/cl-4.png" alt=""/>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- Clients Ends Here -->
	<!-- Contact Starts Here -->
	<div class="contact" id="contact">
			<h3 class="top-head">Contacto </h3>
			<span class="line">
				<span class="sub-line"></span>
			</span>
			<p>Si tienes dudas o sugerencias dejanos un mensaje.</p>
<!-- 			<div class="map"> -->
<!-- 					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d212270.54512304926!2d-84.42060395!3d33.7677129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1415712447570" frameborder="0" style="border:0"></iframe> -->
<!-- 				<div class="map-mask"></div> -->
<!-- 				<div class="map-loc"> -->
<!-- 					<div class="locater"> -->
<!-- 						<img src="resources/images/map-loc.png" alt=""/> -->
<!-- 					</div> -->
<!-- 					<div class="map-add"> -->
<!-- 						<p>Dirección Yo Donante, Lima, Perú</p> -->
<!-- 						<p>(55) 555 555 5555</p> -->
<!-- 						<p><a href="mailto:example@email.com">info@yodonante.com</a></p> -->
<!-- 					</div> -->
<!-- 					<div class="clearfix"></div> -->
<!-- 				</div> -->
<!-- 			</div> -->
<!-- 			<h3 class="top-head">Formulario de Contacto</h3> -->
			<div class="container">
				<div class="contact-box">
					<div class="text">
						<input type="text"  placeholder="NOMBRE" required="" />
						<input type="text"  placeholder="EMAIL" required=""/>
						<input type="text"  class="text-1"  placeholder="TELÉFONO" required=""/>
					</div>
					<div class="text">
						<textarea  placeholder="MENSAJE" required=""></textarea>
					</div>
					<div class="text">
						<input type="submit" value="send" />
					</div>
					
				</div>
			</div>
	</div>
	<!-- Contact Ends Here -->
	<!-- Footer Starts Here -->
	<div class="footer">
		<div class="container">
			<div class="footer-logo">
				<a href="index.php"><img src="resources/images/footer-logo.png" alt=""/></a>
			</div>
			<ul class="footer-list">
				<li><i class="fa"></i></li>
				<li><i class="fc"></i></li>
				<li><i class="ff"></i></li>
				<li><i class="fh"></i></li>
			</ul>
		</div>
	</div>
	<div class="copyright">
		<div class="top-up">
			<a href="#home" class="scroll"><img src="resources/images/top-tp.png" alt=""/></a>
		</div>
		<p>2015 Registrado por <a href="http://yodonante.com/">YoDonante</a></p>
	</div>
		
		<script>
		// This example displays an address form, using the autocomplete feature
		// of the Google Places API to help users fill in the information.
		
		var countryRestrict = {'country': 'us'};
		var placeSearch, autocomplete;
		var componentForm = {
		  locality: 'long_name',
		  administrative_area_level_1: 'short_name',
		  country: 'long_name'
		};
		

		function initAutocomplete() {
		  // Create the autocomplete object, restricting the search to geographical
		  // location types.
		  autocomplete = new google.maps.places.Autocomplete(
			  /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
			  {types: ['geocode']});

		  // When the user selects an address from the dropdown, populate the address
		  // fields in the form.
		  autocomplete.addListener('place_changed', fillInAddress);
		}

		// [START region_fillform]
		function fillInAddress() {
		  // Get the place details from the autocomplete object.
		  var place = autocomplete.getPlace();

		  for (var component in componentForm) {
			document.getElementById(component).value = '';
			document.getElementById(component).disabled = false;
		  }

		  // Get each component of the address from the place details
		  // and fill the corresponding field on the form.
		  for (var i = 0; i < place.address_components.length; i++) {
			var addressType = place.address_components[i].types[0];
			if (componentForm[addressType]) {
			  var val = place.address_components[i][componentForm[addressType]];
			  document.getElementById(addressType).value = val;
			}
		  }
		}
		// [END region_fillform]

		// [START region_geolocation]
		// Bias the autocomplete object to the user's geographical location,
		// as supplied by the browser's 'navigator.geolocation' object.
		function geolocate() {
		  if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
			  var geolocation = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			  };
			  var circle = new google.maps.Circle({
				center: geolocation,
				radius: position.coords.accuracy
			  });
			  autocomplete.setBounds(circle.getBounds());
			});
		  }
		}
		// [END region_geolocation]

		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD8HRW3jVnhXM5xz7vV4kdWdqPf5YwK2E&signed_in=true&libraries=places&callback=initAutocomplete"
        async defer></script>
	
</body>
</html>