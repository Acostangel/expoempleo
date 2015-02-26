<?php include('includes/conexion.php') ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Identidades RH SRL | Envio Mensaje</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }>
</script>
<meta name="keywords" content="Mensaje enviado Correctamente" />
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
<?php $seleccionado =5; ?>
<?php include('includes/header.php') ?>
<!--about start here-->
<div class="solution">
	<div class="container">
		<div class="solution-main">
			<?php 
				$error = array();

			if (isset($_POST['envio']) && (!empty($_POST['nombre'])) && (!empty($_POST['email'])) && (!empty($_POST['mensaje']))){
				$nombre = utf8_decode($_POST['nombre']);
				$email = $_POST['email'];
				$mensaje = utf8_decode($_POST['mensaje']);
				$estado = "1";

				if (0 === preg_match("/\S+/", $_POST['nombre'])){$error['nombre'] = "No puede dejar campos vacios.";}
				if (0 === preg_match("/.+@.+\..+/", $_POST['email'])){$error['email'] = "Debe insertar un email valido.";}
				if (0 === preg_match("/\S+/", $_POST['mensaje'])){$error['mensaje'] = "No puede dejar campos vacios.";}

				if(!$error) {
				$sql = "INSERT into contactos (nombre, email, mensaje, estado, fecha) values ('$nombre','$email','$mensaje', '$estado', CURDATE())";
				$Query = mysqli_query($conn, $sql);
				header("Location: ok.php" ); }
			} else { echo "<h4>No puede dejar campos vacios.</h4><div class='sol-bwn'><a href='contact.php'>Volver a intentar</a></div>";} 

			if($error){ echo "<h4>";
          		foreach ($error as $alert) { echo "$alert"; echo "</h4>"; echo "<div class='sol-bwn'><a href='contact.php'>Volver a intentar</a></div>"; }
            } ?>
		  <div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--about end here-->
<?php include('includes/footer.php') ?> 
</body>
</html>
<?php mysqli_close($conn) ?>