<?php include('../includes/conexion.php'); 

if (isset($_SESSION['MM_ID'])){
   header("Location: control.php" ); 
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['email'])) {
  $loginUsername=$_POST['email'];
  $password=md5($_POST['pass']);
  $MM_redirectLoginSuccess = "Control.php";
  $MM_redirectLoginFailed = "index.php?error=1";
  $MM_redirecttoReferrer = false;
  mysqli_select_db($conn, $db);
    
 $LoginRS__query=sprintf("SELECT id, email, pass FROM `admin` WHERE email=%s AND pass=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($conn, $LoginRS__query) or die(mysqli_error($conn));
  $row_Iddeuser = mysqli_fetch_assoc($LoginRS);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
    
  if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_ID'] = $row_Iddeuser['id'];

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];  
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<html>
<head>
    <title>Admin</title>
</head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="includes/logincss.css">

<body>
    <div class="container">

        <?php if(isset($_GET['error'])){
            if ($_GET["error"] == '1') echo "<div align='center' class='error'>Nombre de Usuario ó Contraseña Incorrecto.</div>"; 
            else if ($_GET["error"] == '2') echo "<div align='center' class='correcto'>Hecho!! revise su correo para ver instrucciones.</div>"; 
        } ?>
        
        <form id="signup" style="margin-top:50px;" action="<?php echo $loginFormAction; ?>" method="POST">

            <div class="header">
            
                <h3 style="margin-top:20px;">Administración</h3>
                
            </div>
            
            <div class="sep"></div>

            <div class="inputs">
            
                <input type="email" placeholder="E-mail" name="email" autofocus />
            
                <input type="password" name="pass" placeholder="Contraseña" />
                
                <div class="checkboxy">
                    <label class="terms"><a href="reset.php">Olvide mi Contraseña</a></label>
                </div>
                
               <input type="submit" value="Iniciar Sesión" id="submit">
            
            </div>

        </form>
    </div>
</body>
</html>
