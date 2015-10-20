<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Dona</title>
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
						<li><a href="index.php#about" class="scroll"><i class="settings"></i><p>Que hacemos</p><div class="clears"></div></a></li>
						<li class="naa"><a href="index.php#case"><i class="like"></i><p>Casos</p><div class="clears"></div></a></li>
						<li class="nab"><a href="index.php#registro"><i class="message"></i><p>Registro</p><div class="clears"></div></a></li>
						<li class="nac"><a href="index.php#contact"><i class="send"></i><p>Contacto</p><div class="clears"></div></a></li>
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
	<!-- About US Starts Here -->
	<div class="about" id="about">
		<div class="container">
			<h3 class="top-head">Encuentra tu Donante</h3>
			<span class="line">
				<span class="sub-line"></span>
			</span>
			<p>A través de esta búsqueda se podrá filtrar todas los donantes registrados que coincidan con el Tipo de sangre y la ubicación</p>
			<div class="row about-row">
				<div class="col-md-6 about-column">
					<p>Buscar por Tipo de Sangre:</p>
					<div class="text">
						<select>
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
					</div>
					<p>Filtrar Ubicación.</p>
					<input type="checkbox" name="" value="">Usar mi ubicación</input><br></br>
					
					<div class="text">
						<select>
						  <option>PAÍS</option>
						  <option>PERÚ</option>
						</select>
						<select>
						  <option>DEPARTAMENTO</option>
						  <option>LA LIBERTAD</option>
						</select><br></br><br></br>
						<select>
						  <option>PROVINCIA</option>
						  <option>TRUJILLO</option>
						</select>
						 <select>
						  <option>DISTRITO</option>
						  <option>CALIFORNIA</option>
						  <option>VICTOR LARCO HERRERA</option>
						</select>
					</div>
					<div class="but_all"><a href="#">Buscar</a></div>
				</div>
				<div class="col-md-6 about-column">
 					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16138374.279693775!2d-84.04212492318663!3d-9.060774142291072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c850c05914f5%3A0xf29e011279210648!2zUGVyw7o!5e0!3m2!1ses!2spe!4v1445188249971" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<!-- Footer Starts Here -->
	<div class="footer">
		<div class="container">
			<div class="footer-logo">
				<a href="index.html"><img src="resources/images/footer-logo.png" alt=""/></a>
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
	<!-- Footer Ends Here -->

</body>
</html>