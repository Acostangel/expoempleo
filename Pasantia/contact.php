<?php include('includes/conexion.php') ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Identidades RH SRL | Contacto</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--charset=utf-8"  permite escribir las letras o caracteres con acentos.-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }>
</script>
<meta name="keywords" content="Lobortis Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndriodCompatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
<!-- //end-smoth-scrolling -->
<!---- animated-css ---->
		<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script src="js/wow.min.js"></script>
		<script>
		 new WOW().init();
		</script>
<!---- animated-css ---->
</head>
<body>
<?php $seleccionado =6; ?>
<?php include('includes/header.php') ?>
<!--contact start here-->

<div class="contact">
	<div class="container">
		<div class="contact-main">
			<div class="contact-top">
				<h3>Contáctenos</h3>
				<p> </p>
			</div>
			<div class="col-md-6 contact-left footer-grid wow bounceIn" data-wow-delay="0.4s">
				<h3>Informacion</h3>
				<h4>¿Quienes somos?</h4>
				<p>Somos una empresa especializada en Employer Branding que nace a raíz de los grandes retos enfrentados por las empresas en la atracción y retención de los mejores talentos, ya que existe una intensa competencia en el mercado por ellos. Conectamos los departamentos de Recursos Humanos y Mercadeo, creando un plan de marketing para captar candidatos cualificados a cumplir con los objetivos y necesidades de las empresas. </p>
			</div>
			<div class="col-md-6 contact-right footer-grid wow bounceIn" data-wow-delay="0.4s">
				<form action="procesarcontacto.php" method="POST" name="form1">
					
					<input type="text" name="nombre" placeholder="Nombre" value=""/>
					<input type="text" name="email"  placeholder="Correo" value=""/>
					<textarea  name="mensaje" placeholder="Mensaje" maxlength="400" size="400" value=""/></textarea>
					<input type="submit" value="Enviar" name="envio">
				</form>
			</div>
		  <div class="clearfix"> </div>
		</div>
	</div>
</div>
<?php include('includes/footer.php') ?>
</body>
</html>
<?php mysqli_close($conn) ?>