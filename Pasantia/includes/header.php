<!--header start here-->
<div class="header">
	<div class="container head-nav-back">
		<div class="header-main">
			<div class="logo wow bounceIn" data-wow-delay="0.4s">
				<!--<a href="index.php"> <img src="images/logo2.png" alt=""/> </a> -->
				<a href="index.php"> <img src="images/logo2.png" alt=""/> </a>
			</div>
			<div class="navg">
				<span class="menu"> <img src="images/icon.png" alt=""/></span>
				<ul class="res">
					<li><a href="index.php" <?php if ($seleccionado ==1) { ?>class="active"<?php } ?>>Inicio</a></li>
					<li><a href="about.php" <?php if ($seleccionado ==2) { ?>class="nost active"<?php } ?>>Nosotros</a></li>
					<li><a href="service.php" <?php if ($seleccionado ==3) { ?>class="ser active"<?php } ?>>Servicios</a></li>
					<li><a href="english.php" <?php if ($seleccionado ==4) { ?>class="cont active"<?php } ?>>English FAC</a></li>
					<li><a href="solution.php" <?php if ($seleccionado ==5) { ?>class="proj active2"<?php } ?>>Expo Empleos</a></li>
					<li><a href="contact.php" <?php if ($seleccionado ==6) { ?>class="cont active"<?php } ?>>Contactos</a></li>
				</ul>
				 <script>
                              $( "span.menu").click(function() {
                                                                $(  "ul.res" ).slideToggle("slow", function() {
                                                                 // Animation complete.
                                                                 });
                                                                 });
                 </script>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="clear"></div>
<!--header end here-->