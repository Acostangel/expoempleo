<!--banner start here-->
<?php include ('conexion.php'); 
	$sql = "SELECT * FROM sliders order by id desc LIMIT 1";
	$run = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($run);	
?>
<div class="banner">
	<div class="container">
		<div class="banner-main">
			<div class="col-md-6 banner-left">
				<a href="#"><?php echo $row['titulo']; ?></a>
				<div class="lobo">
					<P><?php echo $row['subtitulo']; ?></P>
				</div>
			</div>
			<div class="col-md-6 banner-right">
				<div class="logo wow bounceIn" data-wow-delay="0.4s">
					<img src="sliders/<?php echo $row['imagen']; ?>" alt="" style="max-width:500px;" />
				</div>
			</div>
		   <div class="clearefix"> </div>
		</div>
	</div>
</div>
<?php mysqli_close($conn) ?>
<!--banner end here-->