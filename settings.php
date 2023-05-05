<?php require_once('config/connection.php');
    session_start();
    //when user is logged in with session
    if (isset($_SESSION['username'])) {
        
    }else if(isset($_COOKIE['username'])){ //when user is logged with cookies
        
    }else{ //when user is not loggedin
        header("Location: logout.php");
        exit();
    }

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
<?php include_once('parts/menu.php');?>          
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
<!--editar-->
<div class="graph_box1">
<div class="col-md-6 grid_2 grid_2_bot">
<div class="grid_1">
<div class="xs tabls">
<div class="bs-example4" data-example-id="contextual-table">
<a href="new-user" class="btn btn-primary">Novo usuário</a>
<table class="table">
<thead>
<tr>
<th width="28%">Usuário</th>
<th width="41%">E-mail</th>
<th width="31%" align="center">Ações</th>
</tr>
</thead>
<tbody>
<?php
# Realiza a consulta na tabela
$query = "SELECT * from usuarios WHERE status = '1' ORDER BY name_user ASC";
$result = $conn->query($query);
# Filtra através das linhas de consulta
while ($row = mysqli_fetch_object($result)) {
?>
<tr>
<td><?php echo $row->name_user ?></td>
<td><?php echo $row->email_user ?></td>
<td align="center">
<a href="edt-user?id=<?php echo $row->id ?>" class="btn btn-warning">
<i class="glyphicon glyphicon-pencil" title="Editar"></i>
</a>
<a href="remove_user?id=<?php echo $row->id ?>" class="btn btn-danger ">
<i class="glyphicon glyphicon-trash" title="Excluir"></i>
</a>
</td>
</tr>
<?php
	}  
?>

</tbody>
</table>
</div>
</div>


</div>
</div>
<div class="col-md-6 grid_2 grid_2_bot">
<div class="grid_1">
<div class="xs tabls">
<div class="bs-example4" data-example-id="contextual-table">
<a href="new-cond" class="btn btn-primary">Novo Condominio</a>
<table class="table">
<thead>
<tr>
<th>Condominios</th>
<th width="31%" align="center" style="text-align:center">Ações</th>
</tr>
</thead>
<tbody>
<?php
# Realiza a consulta na tabela
$query_cond = "SELECT * from condominios ORDER BY nome_cond ASC";
$result = $conn->query($query_cond);
# Filtra através das linhas de consulta
while ($condominios = mysqli_fetch_object($result)) {
?>

<tr>
<td><?php echo $condominios->nome_cond ?></td>
<td align="center">
<a href="edt-cond?id=<?php echo $condominios->id_cond ?>" class="btn btn-warning">
<i class="glyphicon glyphicon-pencil" title="Editar"></i>
</a>
<a href="remove_cond?id=<?php echo $condominios->id_cond ?>" class="btn btn-danger ">
<i class="glyphicon glyphicon-trash" title="Excluir"></i>
</a>
</td>
</tr>
<?php
	}  
?>
</tbody>
</table>
</div>
</div>

</div>
</div>


<div class="clearfix"> </div>
</div>

<!--//editar-->

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