<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
	xmlns:h="http://java.sun.com/jsf/html"
	xmlns:f="http://java.sun.com/jsf/core"
	xmlns:p="http://primefaces.org/ui"
	xmlns:ui="http://java.sun.com/jsf/facelets">

<h:head>

<title>Yo Donante</title>
<link href="resources/css/bootstrap.css" rel='stylesheet' type='text/css' />
<script src="resources/js/jquery-1.11.0.min.js"></script>
<link href="resources/css/style.css" rel='stylesheet' type='text/css' />
<script src="resources/js/responsiveslides.min.js"></script>
<script type="text/javascript" src="resources/js/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="resources/js/move-top.js"/>
<script type="text/javascript" src="resources/js/easing.js"/>
<script type="text/javascript" src="resources/js/metodo.js"/>

<meta name="viewport" content="width=device-width, initial-scale=1"></meta>

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:200,300,600,400,700,900' rel='stylesheet' type='text/css'>
</link>

	
</h:head>
<h:body>
<!-- Header Starts Here -->
		<div class="header" id="home">
			<div class="container">
				<div class="logo">
					<a href="index.jsf"><img src="resources/images/logo.png" alt=""/></a>
				</div>
				<span class="menu" onclick="valor();"></span>
				<div class="clears"></div>
				
				<div class="navigation">
					<ul class="navig">
						<li><a href="#about" class="scroll"><i class="settings"></i><p>Que hacemos</p><div class="clears"></div></a></li>
						<li class="naa"><a href="index.jsf#new"><i class="like"></i><p>Casos</p><div class="clears"></div></a></li>
						<li class="nab"><a href="index.jsf"><i class="message"></i><p>Registro</p><div class="clears"></div></a></li>
						<li class="nac"><a href="index.jsf"><i class="send"></i><p>Contacto</p><div class="clears"></div></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	<!-- Header Ends Here --> 
	<!-- About US Starts Here -->
	<div class="about" id="about">
		<div class="container">
			<h3 class="top-head">QUÉ HACEMOS</h3>
			<span class="line">
				<span class="sub-line"></span>
			</span>
			<p>	Nuestra Aplicación <b>YoDonante</b> ayudará a ubicar donantes voluntarios compatibles utilizando un sistema de busqueda y contacto. 
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
			<p>De esta forma se cumplirá con el criterio de escalabilidad y podremos contribuir al <b>aumento del número de donantes 
			de sangre voluntarios en el Perú.</b></p>
			<p>A causa de una situación crítica de un amigo nuestro, en la que se necesitó con urgencia la donación de una unidad de sangre, 
			pudimos darnos cuenta del deficiente número de donantes voluntarios existente a nuestro alrededor, así como de la ignorancia 
			del tipo de sangre y la falta de concientización en las personas acerca del tema, estas desventajas retrasan el tiempo de 
			espera de la donación, lo que resulta ser perjudicial para el paciente receptor ya que en su condición el tiempo es vital.</p>
			<p>Según datos oficiales:<b> El Perú necesita 600 mil unidades de sangre como stock adecuado</b>, sin embargo <b>en el 2013 solo se 
			recaudó 185 mil (30,8%) del cual el 5% de la cifra total son aportantes voluntarios</b>. Un indicador de la OMS da cuenta 
			de que <b>para que un país tenga autosuficiencia, el 2% de la población debería de donar sangre. En nuestro país, 
			la cifra es de 0,5%</b></p>
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
	<h:form>
	<br/>
	<h:outputText value="#{testMB.value}"/>
	</h:form>	
</h:body>
</html>