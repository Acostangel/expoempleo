<?php include('../includes/conexion.php'); if (!isset($_SESSION['MM_ID'])){ header("Location: index.php?error=1" );} ?>

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
<?php $sel = "2"; ?>
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
 
    <div class="right_content"> 


    <?php if (isset($_POST['submit'])) {
        
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        if ($nombre =='' OR $email =='' OR $pass ==''){ echo "<div align='center' style='padding: 4px; background-color: #DD4242; color: white; font-size:16px; border-radius: 6px;'>No puede dejar Campos vacios.</div>";  } else { 

    $qery = "INSERT INTO admin (nombre, email, pass)values ('$nombre','$email','$pass')";
    $ejec = mysqli_query($conn, $qery);
    header("Location: procesook.php");}
}
 ?>                
    <h2>Crear usuario</h2> 
    <div class="form">
         <form action="" method="post" class="niceform">
         
                <fieldset>
                    <dl>
                        <dt><label for="title">Nombre de Usuario:</label></dt>
                        <dd><input type="text" name="nombre" size="25" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="title">Correo Electronico:</label></dt>
                        <dd><input type="text" name="email" size="54" /></dd>
                    </dl> 
                    <dl>
                        <dt><label for="title">Contraseña:</label></dt>
                        <dd><input type="password" name="pass" size="40" /></dd>
                    </dl>                    
                    <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="Crear" />
                    </dl>                   
                </fieldset>   
         </form>
         </div>
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               

    <div class="clear"></div>
    </div> <!--end of main content-->
    
<?php include('includes/footer.php') ?>
</div>      
</body>
</html>