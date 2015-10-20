<?php
	include("conexion.php");

	if (isset($_GET["id"])) {
		$id = $_GET["id"];
	}
	$query = "SELECT R.id, R.idcentro, R.tiposangre, R.unidades, R.fecha, R.idusuario, R.notas, R.codigo, R.estado, C.nombre as nombrecentro, C.imagen, C.distrito, C.departamento, C.norte, C.este  
		FROM requerimientos as R
		inner join centros as C on C.id = R.idcentro
		where R.id = '$id'";	

	$rs = mysql_query($query);
	$row = mysql_fetch_array($rs);
	
	$tiposangre = $row["tiposangre"];
	$imagen = $row["imagen"];
	$message = "";
	
	if($tiposangre == "AB +"){
		$message = "AB+, AB-, A+, A-, B+, B-, O+ u O-";
	}
	if($tiposangre == "AB -"){
		$message = "AB-, A-, B- u O-";
	}
	if($tiposangre == "A +"){
		$message = "A+, A-, O+, O-";
	}
	if($tiposangre == "A -"){
		$message = "A-, O-";
	}
	if($tiposangre == "B +"){
		$message = "B+, B-, O+, O-";
	}
	if($tiposangre == "B -"){
		$message = "B- u O-";
	}
	if($tiposangre == "O +"){
		$message = "O+ u O-";
	}
	if($tiposangre == "O -"){
		$message = "O-";
	}

	
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Dona</title>
    <!-- You can use open graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    <meta property="og:url"           content="http://smartactionperu.com/yodonante/donar.php?id=<?php echo $id?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="YoDonante" />
    <meta property="og:description"   content="Se necesita <?php echo $row["unidades"]; ?>
				<?php if($row["unidades"] == '1'){ ?>
					unidad
				<?php } else { ?>
					unidades
				<?php } ?>
				de Sangre <?php echo $message; ?>" />
    <meta property="og:image"         content="http://www.smartactionperu.com/yodonante/resources/images/centros/<?php echo $imagen?>" />
	
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=665295953571326";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

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


		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
			function initialize() {
				var latlng = new google.maps.LatLng(<?php echo $row["norte"];?>, <?php echo $row["este"];?>);
				var settings = {
					zoom: 17,
					center: latlng,
					mapTypeControl: true,
					mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
					navigationControl: true,
					navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
					mapTypeId: google.maps.MapTypeId.ROADMAP};
				var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
				var contentString = '<div id="content">'+
					'<div id="siteNotice">'+
					'</div>'+
					'<h1 id="firstHeading" class="firstHeading">Høgenhaug</h1>'+
					'<div id="bodyContent">'+
					'<p><a href="#">Entrar</a>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>'+
					'</div>'+
					'</div>';
				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});
				
				var trainImage = new google.maps.MarkerImage('resources/images/marker.png',
					new google.maps.Size(100,50),
					new google.maps.Point(0,0),
					new google.maps.Point(50,50)
				);

				var trainPos = new google.maps.LatLng(<?php echo $row["norte"];?>, <?php echo $row["este"];?>);

				var trainMarker = new google.maps.Marker({
					position: trainPos,
					map: map,
					icon: trainImage,
					title:"Train Station",
					zIndex: 2
				});
				
				google.maps.event.addListener(companyMarker, 'click', function() {
					infowindow.open(map,companyMarker);
				});
			}
		</script>

	
</head>
<body onload="initialize()">
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
	<div class="about" id="about">
		<div class="container">
			<h3 class="top-head">Código de Donación: <?php echo $row["codigo"]; ?></h3>
			<span class="line">
				<span class="sub-line"></span>
			</span>
			<p> Se necesita <?php echo $row["unidades"]; ?>
				<?php if($row["unidades"] == '1'){ ?>
					unidad
				<?php } else { ?>
					unidades
				<?php } ?>
				de Sangre <?php echo $message; ?><br>
				<?php echo $row["nombrecentro"]; ?> (<?php echo $row["departamento"].", ".$row["distrito"]; ?>)</p><br>
				<div class="fb-share-button" 
						data-href="http://smartactionperu.com/yodonante/donar.php?id=<?php echo $id?>" 
						data-layout="button_count">
				</div>&nbsp;&nbsp;&nbsp;
				<div class="fb-send" data-href="http://smartactionperu.com/yodonante/donar.php?id=<?php echo $id?>" ></div>
			<div class="row about-row">
				<div class="col-md-6 about-column">
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
						<img src="resources/images/centros/<?php echo $row['imagen'] ?>" class="img-responsive" alt="" width="100%" />
					</div>
					
				</div>
				<div class="col-md-6 about-column">
				<div id="map_canvas" style="width:100%; height:500px"></div>
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