<?php include('conexion.php'); if (!isset($_SESSION['MM_ID'])){ header("Location: index.php?error=1" );}  ?>
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subir Imagen Slider</title>
</head>

<body style="background-color: #D1D1D1; background-image:none;">

<?php if ((isset($_POST["enviado"])) && ($_POST["enviado"] == "form1")) {
  $nombre_archivo = $_FILES['userfile']['name'];
  move_uploaded_file($_FILES['userfile']['tmp_name'], "../../sliders/".$nombre_archivo);
?>

  <script type="text/javascript">
    opener.document.form1.<?php echo $_POST["nombrecampo"]; ?>.value="<?php echo $nombre_archivo; ?>";
    self.close();
  </script>

  <?php 
}
else
{?>

<form action="subir.php" method="post" enctype="multipart/form-data" id="form1" name="form1">

  <p align="center" style="padding-top:20px; padding-bottom: 10px;">
    <input name="userfile" type="file" class="button2"/> 
  </p>
  <p align="center">
    <input type="submit" name="button" id="button" value="Subir Imagen" class="button1"/> 
  </p><input name="nombrecampo" type="hidden" value="<?php echo $_GET["campo"]; ?>">
  <input type="hidden" name="enviado" value="form1" />
</form>
<?php }?>
</body>
</html>