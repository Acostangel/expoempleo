<?php 

//validacion 
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string(mysqli_connect(), $theValue) : mysqli_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

//sacar nombre
function nombre($idusuario){
	global $db, $conn;
	mysqli_select_db($conn, $db);
	$query_getnameid = sprintf("SELECT admin.nombre FROM admin WHERE admin.id = %s",$idusuario,"int");
	$getnameid = mysqli_query($conn, $query_getnameid) or die(mysqli_error($conn));
	$row_getnameid = mysqli_fetch_assoc($getnameid);
	$totalRows_getnameid = mysqli_num_rows($getnameid);
	return $row_getnameid['nombre'];
	
mysqli_free_result($getnameid);
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL; 
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['MM_ID'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['MM_ID']);
  unset($_SESSION['PrevUrl']);
  
  $logoutGoTo = "http://localhost/new/_useradmin/index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}

 ?>