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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "update")) {
  $updateSQL = sprintf("UPDATE conta SET titulo_conta=%s, vencimento=%s, valor=%s, status=%s, id_cond=%s WHERE id_conta=%s",
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['data'], "date"),
                       GetSQLValueString($_POST['valor'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['condominio'], "int"),
                       GetSQLValueString($_POST['id_conta'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

$colname_edt_conta = "-1";
if (isset($_GET['id'])) {
  $colname_edt_conta = $_GET['id'];
}
mysql_select_db($database_conn, $conn);
$query_edt_conta = sprintf("SELECT * FROM conta WHERE id_conta = %s", GetSQLValueString($colname_edt_conta, "int"));
$edt_conta = mysql_query($query_edt_conta, $conn) or die(mysql_error());
$row_edt_conta = mysql_fetch_assoc($edt_conta);
$totalRows_edt_conta = mysql_num_rows($edt_conta);

mysql_select_db($database_conn, $conn);
$query_lista_condminios = "SELECT * FROM condominios";
$lista_condminios = mysql_query($query_lista_condminios, $conn) or die(mysql_error());
$row_lista_condminios = mysql_fetch_assoc($lista_condminios);
$totalRows_lista_condminios = mysql_num_rows($lista_condminios);

mysql_select_db($database_conn, $conn);
$query_menu = "SELECT * FROM condominios ORDER BY nome_cond ASC";
$menu = mysql_query($query_menu, $conn) or die(mysql_error());
$row_menu = mysql_fetch_assoc($menu);
$totalRows_menu = mysql_num_rows($menu);
?>
<!--
Author: NooBox Web Host & Design
Author URL: http://noobox.org
-->
<!DOCTYPE HTML>
<html lang="pt_BR">
<head>
<title>Controle de Contas</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="images/icon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="images/icon.ico" type="image/x-icon"/>
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

<!--//end-animate-->
<!-- Meters graphs -->
<!-- Placed js at the end of the document so the pages load faster -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker( $.datepicker.regional[ "pt_BR" ] );
    $( "#locale" ).on( "change", function() {
      $( "#datepicker" ).datepicker( "option",
        $.datepicker.regional[ $( this ).val() ] );
    });
  } );
  /* Brazilian initialisation for the jQuery UI date picker plugin. */
/* Written by Leonildo Costa Silva (leocsilva@gmail.com). */
( function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define( [ "../widgets/datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}( function( datepicker ) {

datepicker.regional[ "pt-BR" ] = {
	closeText: "Fechar",
	prevText: "&#x3C;Anterior",
	nextText: "Próximo&#x3E;",
	currentText: "Hoje",
	monthNames: [ "Janeiro","Fevereiro","Março","Abril","Maio","Junho",
	"Julho","Agosto","Setembro","Outubro","Novembro","Dezembro" ],
	monthNamesShort: [ "Jan","Fev","Mar","Abr","Mai","Jun",
	"Jul","Ago","Set","Out","Nov","Dez" ],
	dayNames: [
		"Domingo",
		"Segunda-feira",
		"Terça-feira",
		"Quarta-feira",
		"Quinta-feira",
		"Sexta-feira",
		"Sábado"
	],
	dayNamesShort: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
	dayNamesMin: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
	weekHeader: "Sm",
	dateFormat: "yy-mm-dd",
	firstDay: 0,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: "" };
datepicker.setDefaults( datepicker.regional[ "pt-BR" ] );

return datepicker.regional[ "pt-BR" ];

} ) );
  </script>
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

<div class="xs"></div>
<div class="col-md-12 inbox_right">
<div class="Compose-Message">               
<div class="panel panel-default">
<div class="panel-body panel-body-com-m">

<form action="<?php echo $editFormAction; ?>" name="update" method="POST" class="com-mail" id="update">
<div class="col-md-12">

<input name="id_conta" type="hidden" id="id_conta" value="<?php echo $row_edt_conta['id_conta']; ?>">
<input type="hidden" id="status" name="status" value="<?php echo $row_edt_conta['status']; ?>">
<div class="col-md-12">
<label>Titulo: </label>
<input name="titulo" type="text" class="form-control1 control3" id="titulo" placeholder="Titulo" value="<?php echo $row_edt_conta['titulo_conta']; ?>">
</div>
<div class="col-md-4">
<label>Valor :  </label>
<input name="valor" type="text" class="form-control1 control3 col-md-4" id="valor" value="<?php echo $row_edt_conta['valor']; ?>">
</div>
<div class="col-md-4">
<label>Data Vencimento :  </label>
<input type="text" class="form-control1 control3 col-md-4" name="data" id="datepicker" value="<?php echo $row_edt_conta['vencimento']; ?>">

</div>
<div class="col-md-4">



<label>Condominio :  </label>
<select name="condominio" class="form-control1 control3 col-md-4 input-group-btn">
  <option>Selecione um Condominio</option>
  
  <?php
do {  
?>
  <option value="<?php echo $row_lista_condminios['id_cond']?>"<?php if (!(strcmp($row_lista_condminios['id_cond'], $row_edt_conta['id_cond']))) {echo "selected=\"selected\"";} ?>><?php echo $row_lista_condminios['nome_cond']?></option>
  <?php
} while ($row_lista_condminios = mysql_fetch_assoc($lista_condminios));
  $rows = mysql_num_rows($lista_condminios);
  if($rows > 0) {
      mysql_data_seek($lista_condminios, 0);
	  $row_lista_condminios = mysql_fetch_assoc($lista_condminios);
  }
?>
</select>

</div><br>
</div>
					
<br>
<div class="col-md-12" style="margin-left:12px; margin-top:20px;">
<input type="submit" value="Atualizar">
</div>
<input type="hidden" name="MM_update" value="update">
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
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
mysql_free_result($edt_conta);

mysql_free_result($lista_condminios);

mysql_free_result($menu);
?>
