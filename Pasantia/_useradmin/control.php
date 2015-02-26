<?php include('../includes/conexion.php'); if (!isset($_SESSION['MM_ID'])){ header("Location: index.php?error=1" );} 
    $sql = "SELECT * FROM contactos order by id desc";
    $sql2 = "DELETE * FROM contactos"; 
    $run2 = mysqli_query($conn, $sql2);
    $run = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($run);
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
        
    <div class="right_content">            
        
    <h2>Listado de Mensaje recibidos de Contactos</h2> 
                               
<table id="rounded-corner2" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
            <th scope="col" class="rounded-company" width="150"><strong>Nombre</strong></th>
            <th scope="col" class="rounded"><strong>Correo</strong></th>
            <th scope="col" class="rounded"><strong>Mensajes</strong></th>
            <th scope="col" class="rounded"><strong>Fecha</strong></th>
            <th scope="col" class="rounded" width="50" align="center"><strong>Ver</strong></th>
            <th scope="col" class="rounded-q4"><strong>Eliminar</strong></th>
        </tr>
    </thead>
        <tfoot>
    	<tr>
        	<td colspan="5" class="rounded-foot-left"><em>A continuación escoja la opcion deseada.</em></td>
        	<td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>
    <tbody>
    <?php if (mysqli_num_rows($run) > 0 ) do { $limit = substr( utf8_encode($rows['mensaje']), 0 , 100); ?>
    	<tr>
            <td width="100"><?php echo $rows['nombre']; ?></td>
            <td width="200"><?php echo $rows['email']; ?></td>
            <td ><?php echo $limit; ?>..</td>
            <td><?php echo $rows['fecha']; ?></td>
            <td align="center"><a href="ver.php?id=<?php echo $rows['id'] ?>"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
            <td align="center"><a href="eliminar.php?id=<?php echo $rows['id'] ?>" class="ask"><img src="images/trash.png" alt="" title="" border="0" /></a></td>
        </tr>  
    <?php } while ($rows = mysqli_fetch_assoc($run)); else { echo "<tr>No hay mensajes Nuevos.</tr> ";}?>     
    </tbody>
</table>

	 <a href="#" class="bt_green"><span class="bt_green_lft"></span><strong>Responder Todos</strong><span class="bt_green_r"></span></a>
     <a href="<?php echo $run2  ?>" class="bt_red"><span class="bt_red_lft"></span><strong>Eliminar Todos</strong><span class="bt_red_r"></span></a> 
           
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               

    <div class="clear"></div>
    </div> <!--end of main content-->
	
<?php include('includes/footer.php') ?>
</div>		
</body>
</html>