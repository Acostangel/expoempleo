<?php 	include('../includes/conexion.php');
		include('auth.php'); 
		if(!credentials_valid($_POST['email'], $_POST['pass'])){
			header("location: index.php?error=1");
			exit("Ser&aacute; redireccionado en breve freco.");
		} else{echo "Login Correcto";}
		
?>