<?php require_once('Connections/conn.php');
    session_start();
    //when user is logged in with session
    if (isset($_SESSION['username'])) {
        
    }else if(isset($_COOKIE['username'])){ //when user is logged with cookies
        
    }else{ //when user is not loggedin
        header("Location: logout.php");
        exit();
    }

?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "update-cond")) {
  $updateSQL = sprintf("UPDATE condominios SET nome_cond=%s WHERE id_cond=%s",
                       GetSQLValueString($_POST['condominio'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

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

mysql_select_db($database_conn, $conn);
$query_menu = "SELECT * FROM condominios ORDER BY nome_cond ASC";
$menu = mysql_query($query_menu, $conn) or die(mysql_error());
$row_menu = mysql_fetch_assoc($menu);
$totalRows_menu = mysql_num_rows($menu);
$query_menu = "SELECT * FROM condominios ORDER BY nome_cond ASC";
$menu = mysql_query($query_menu, $conn) or die(mysql_error());
$row_menu = mysql_fetch_assoc($menu);
$totalRows_menu = mysql_num_rows($menu);

$colname_edt_cond = "-1";
if (isset($_GET['id'])) {
  $colname_edt_cond = $_GET['id'];
}
mysql_select_db($database_conn, $conn);
$query_edt_cond = sprintf("SELECT * FROM condominios WHERE id_cond = %s", GetSQLValueString($colname_edt_cond, "int"));
$edt_cond = mysql_query($query_edt_cond, $conn) or die(mysql_error());
$row_edt_cond = mysql_fetch_assoc($edt_cond);
$totalRows_edt_cond = mysql_num_rows($edt_cond);
?>
<!--
Author: NooBox Web Host & Design
Author URL: http://noobox.org
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Controle de Contas</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="images/icon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="images/icon.ico" type="image/x-icon"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<script>
new WOW().init();
</script>
<!--//end-animate-->
<!-- Meters graphs -->
<script src="js/jquery.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head> 

<body class="sticky-header"  onload="initMap()">
<section id="all">
<!-- left side start-->
<div class="left-side sticky-left-side">
<div class="logo-icon text-center">
<a><i class="lnr lnr-./"></i></a>
</div>

<!--logo and iconic logo end-->
<div class="left-side-inner">
<div class="logo">
<h1><a href="./">Contas <span>1.0</span></a></h1>
</div>
<!--sidebar nav start-->
<ul class="nav nav-pills nav-stacked custom-nav">
<li>&nbsp;</li>

<?php do { ?>
  <li style="font-size:15px;"><a href="condominio?id=<?php echo $row_menu['id_cond']; ?>"><i class="lnr lnr-apartment"></i><span><?php echo $row_menu['nome_cond']; ?></span></a></li>
  <?php } while ($row_menu = mysql_fetch_assoc($menu)); ?>

<li>&nbsp;</li>
<li><a href="settings"><i class="lnr lnr-cog"></i> <span>Configurações</span></a></li>
<li><a href="logout"><i class="lnr lnr-user"></i> <span>Sair</span></a></li>              
</ul>
<!--sidebar nav end-->
</div>
</div>
<!-- left side end-->

<!-- main content start-->
<div class="main-content main-content4">
<!-- header-starts -->
<div class="header-section">



<!--top start -->
<div class="menu-right">
<div class="user-panel-top">
&nbsp;&nbsp;<button type="button" class="btn btn-success" onClick="location.href='nova-conta'">Cadastrar Conta</button><p>&nbsp;</p>
</div>
</div>
<!--top end -->
</div>
<!-- //header-ends -->
<div id="page-wrapper">
<div class="graphs">
<h3 class="blank1"></h3>
<div class="xs"></div>
<div class="col-md-12 inbox_right">
<div class="Compose-Message">               
<div class="panel panel-default">
<div class="panel-body panel-body-com-m">
<form action="<?php echo $editFormAction; ?>" name="update-cond" method="POST" class="com-mail" id="update-cond">
<h3><?php echo $row_edt_cond['nome_cond']; ?></h3>
<input name="id" type="hidden" id="id_user" value="<?php echo $row_edt_cond['id_cond']; ?>">
<input name="condominio" type="text" class="form-control1 control3" id="nome" value="<?php echo $row_edt_cond['nome_cond']; ?>">
<hr>
<input type="submit" value="Atualizar">
<input type="hidden" name="MM_update" value="update-cond">
</form>
</div>
</div>
</div>
</div>
<div class="clearfix"> </div>
</div>
</div>
</div>
</div>
<!--footer section start-->
<footer>
<p>&copy 2016 Contas 1.0 . All Rights Reserved | Developer by <a href="http://noobox.org/" target="_blank">NooBox.</a></p>
</footer>
<!--footer section end-->
</section>

<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
mysql_free_result($menu);

mysql_free_result($edt_cond);
?>