<?php require_once('Connections/conn.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "newuser")) {
  $insertSQL = sprintf("INSERT INTO usuarios (id, name_user, email_user, password) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_user'], "int"),
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['senha'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());

  $insertGoTo = "settings";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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

$colname_edtusuarios = "-1";
if (isset($_GET['id'])) {
  $colname_edtusuarios = $_GET['id'];
}
mysql_select_db($database_conn, $conn);
$query_edtusuarios = sprintf("SELECT * FROM usuarios WHERE id = %s", GetSQLValueString($colname_edtusuarios, "int"));
$edtusuarios = mysql_query($query_edtusuarios, $conn) or die(mysql_error());
$row_edtusuarios = mysql_fetch_assoc($edtusuarios);
$totalRows_edtusuarios = mysql_num_rows($edtusuarios);
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
<form method="POST" action="<?php echo $editFormAction; ?>" name="newuser" class="com-mail" id="newuser">
<input name="id_user" type="hidden" id="id_user">
<label>Nome: </label>
<input name="nome" type="text" class="form-control1 control3" id="nome" placeholder="Seu Nome">
<label>E-mail :  </label>
<input name="email" type="text" class="form-control1 control3" id="email" placeholder="user@mail.com">
<label>Senha :  </label>
<input name="senha" type="text" class="form-control1 control3" id="senha" placeholder="1234">
<hr>
<input type="submit" value="Cadastrar">
<input type="hidden" name="MM_insert" value="newuser">
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

mysql_free_result($edtusuarios);
?>