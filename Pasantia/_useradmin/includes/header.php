<?php $sql= "Select * from contactos where estado='1'"; $x = mysqli_query($conn, $sql); $y = mysqli_num_rows($x); ?>
<div class="header">
<div class="logo"><a href="control.php"><img src="../images/logo.png" alt="" title="" border="0" /></a></div>

<div class="right_header">Bienvenid@ <?php echo nombre($_SESSION['MM_ID']); ?> | <a href="#" class="messages">(<?php echo $y ?>) Mensajes Nuevos</a> | <a href="<?php echo $logoutAction ?>" class="logout">Salir</a></div>
<div class="jclock"></div>
</div>
<?php mysqli_close($conn); ?>