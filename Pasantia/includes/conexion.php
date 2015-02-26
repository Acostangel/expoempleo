<?php if (!isset($_SESSION)) {
  session_start();
}?>
<?php $host ="localhost"; $user ="root"; $pass =""; $db ="identidadesrh";
$conn = mysqli_connect($host, $user, $pass, $db) or trigger_error(mysqli_error(),E_USER_ERROR); 

if (is_file("includes/funciones.php")){
include("includes/funciones.php"); 
}
else
{ include("../includes/funciones.php"); }

 ?>