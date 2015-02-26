<?php include('../includes/conexion.php'); if (!isset($_SESSION['MM_ID'])){ header("Location: index.php?error=1" );} 

if (isset($_GET['id'])) {

    $id = $_GET['id'];
   $sql = "SELECT * FROM contactos where id = '$id'";
    $run = mysqli_query($conn, $sql);
    $run2 = mysqli_query($conn, "UPDATE contactos set estado='0' where id = '$id'");
    $rows = mysqli_fetch_assoc($run);
} else {header("Location: control.php" );} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administración IRH</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<script src="jquery.jclock-1.2.0.js.txt" type="text/javascript"></script>
<script type="text/javascript" src="jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>
<script type="text/javascript">
$(function($) {
    $('.jclock').jclock();
});
</script>
<style type="text/css">.pa{margin-bottom: 10px;}</style>

<?php $sel = "1"; ?>

<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />

</head>
<body>
<div id="main_container">
    <?php include('includes/header.php')  ?>
    
    <div class="main_content">
        <?php include('includes/navegacion.php') ?>
                    
                    
                    
                    
    <div class="center_content">  
    
    <?php include('includes/nav.php') ?>
        <form action="" method="POST" name="responder">
        <div id="openModal" class="modalDialog">
            <div>
                <a href="#close" title="Close" class="close">X</a>
                <h2>Responder a <?php echo $rows['nombre']; ?></h2>
                <textarea cols="38" rows="3" placeholder="Escribir mensaje a <?php echo $rows['nombre'] ?>..."></textarea><br>
                <input type="submit" value="Responder" class="btn" name="resp">
            </div>
        </div>
        </form>
    
    <div class="right_content">            
        
    <h2>Mensaje de <?php echo $rows['nombre']; ?></h2> 
                    
    <table style="font-size:16px; padding:4px; ">
        <tr>
            <th align="left">Nombre:</th>
            <td><?php echo $rows['nombre']; ?></td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th align="left">Fecha:</th>
            <td><?php echo $rows['fecha']; ?></td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th align="left">Correo:</th>
            <td><?php echo $rows['email']; ?></td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th align="left" valign="top">Mensaje:</th>
            <td><?php echo utf8_encode($rows['mensaje']); ?></td>
        </tr>
    </table>                


	 <a href="#openModal" class="bt_green"><span class="bt_green_lft"></span><strong>Responder</strong><span class="bt_green_r"></span></a>
     <a href="eliminar.php?id=<?php echo $rows['id'] ?>" class="bt_red"><span class="bt_red_lft"></span><strong>Eliminar</strong><span class="bt_red_r"></span></a> 
           
     </div><!-- end of right content-->
                                
  </div>   <!--end of center content -->               

    <div class="clear"></div>
    </div> <!--end of main content-->
	
<?php include('includes/footer.php') ?>
</div>		
</body>
</html>