<?php include('../includes/conexion.php'); if (isset($_SESSION['MM_ID'])){ header("Location: control.php" );} ?>

<html>
<head>
    <title>Admin</title>
</head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="includes/logincss.css">

<body>
    <div class="container">

    <?php if (isset($_POST['actualizar'])){
    		$pass = $_POST['pass1'];
			$pass1 = $_POST['pass2'];
			$bd_nombre = $_POST['user'];
			$codigo = $_POST['codigos'];
			$encpass = md5($pass);
			if ($pass =='' or $pass1 =='' or $bd_nombre =='' or $codigo ==''){
				echo "<div align='center' class='error'>No puede dejar campos vacios.</div>";
			} else {
				
				if ($pass == $pass1) {
					$update = "UPDATE admin SET pass='$encpass', passreset='0' WHERE nombre='$bd_nombre'";
					$up = mysqli_query($conn, $update);
					echo "<div align='center' class='correcto'>Contraseña cambiada correctamente</div>";
					echo '<br><a href="index.php" class="btn">Volver al login</a>';
				} else {
						echo "<div align='center' class='error'>Contraseñas no coinciden.</div>";
				}
			}
		}
	?>
    </div>
</body>
</html>
