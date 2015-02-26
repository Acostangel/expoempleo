<?php require_once('../../includes/conexion.php'); ?>
<?php if (!isset($_SESSION)) {
  session_start();
}?>

<?php if (!isset($_SESSION['MM_ID'])){
	 header("Location: index.php?error=1" );	
} ?>


<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/globalstyle.css">
<title>Subir Imagen Usuario</title>
</head>

<body style="background-color: #D1D1D1; background-image:none;">

<?php if ((isset($_POST["submit"])) && (!empty($_POST['submit']))) {
	if (($_FILES['userfile']['size']>102400)|| (end(explode(".", $_FILES['userfile']['name']))!="jpg")) 
	echo " <br><p>&nbsp;&nbsp; Solo Ficheros Max. de 100 KB y Poseer una Extensión .jpg</p>";
	else {
	$nombre_archivo = $_FILES['userfile']['name'];
	move_uploaded_file($_FILES['userfile']['tmp_name'], "../imgs/usuarios/".$_SESSION['MM_ID'].".jpg");
?>

  <script type="text/javascript">
    //opener.document.form1.strImagen.value="<?php echo $nombre_archivo; ?>";
    self.close();
  </script>
  

  <?php }  
}
else
{?>

<form action="gestionsubirimg.php" method="post" enctype="multipart/form-data" id="form1">

  <p align="center"><br>
    <input name="userfile" type="file" class="border button2" required/> 
  </p>
  <p align="center"><br><input type="submit" name="button" id="button" value="Subir Imagen" class="button1" /></p>

  <input type="hidden" name="enviado" value="form1" />
</form>
<?php }?>

</body>
</html>