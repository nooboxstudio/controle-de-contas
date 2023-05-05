<?php require_once('config/connection.php');
    session_start();
    //when user is logged in with session
    if (isset($_SESSION['username'])) {
        
    }else if(isset($_COOKIE['username'])){ //when user is logged with cookies
        
    }else{ //when user is not loggedin
        header("Location: logout.php");
        exit();
    }

$id_cond = $_GET['id'];
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
<script src="js/jquery-1.10.2.min.js"></script>
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
<div class="xs tabls">
<!-- tabs-->
<div class="grid_3 grid_5">
<?php
# Realiza a consulta na tabela
$query_cond = "SELECT * from condominios WHERE id_cond = '$id_cond'";
$result = $conn->query($query_cond);
# Filtra através das linhas de consulta
while ($condominios = mysqli_fetch_object($result)) {
?>
<h3><?php echo $condominios->nome_cond ?></h3>
<?php }
?>

<div class="but_list">
<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
<ul id="myTab" class="nav nav-tabs" role="tablist">
<li role="presentation" class="active">
<a href="#prox" id="prox-tab" role="tab" data-toggle="tab" aria-controls="prox" aria-expanded="true">Próximas Contas</a>
</li>
<li role="presentation" class="">
<a href="#vencidas" role="tab" id="vencidas-tab" data-toggle="tab" aria-controls="vencidas" aria-expanded="false">Vencidas</a>
</li>
<li role="presentation" class="">
<a href="#pagas" role="tab" id="pagas-tab" data-toggle="tab" aria-controls="pagas" aria-expanded="false">Pagas</a>
</li>
</ul>
<div id="myTabContent" class="tab-content">
<!--prox-->
<div role="tabpanel" class="tab-pane fade active in" id="prox" aria-labelledby="prox-tab">
<table class="table">
<thead>
<tr>
<th width="33%">Próximas contas</th>
<th width="27%">Data do Vencimento</th>
<th width="40%" align="center" style="text-align:center">Ações</th>
</tr>
</thead>
<tbody>
<?php
$query_prox_cont = "SELECT * FROM conta WHERE vencimento >= curdate() AND status = 1 AND id_cond = '$id_cond'";
$result = $conn->query($query_prox_cont);
# Filtra através das linhas de consulta
while ($prox_contas = mysqli_fetch_object($result)) {

?>
 
<tr>
<td><?php echo $prox_contas->titulo_conta ?></td>
<td><?php
$originalDate_prox = $prox_contas->vencimento;
$newDate_prox = date("d/m/Y", strtotime($originalDate_prox));
echo $newDate_prox ?></td>
<td align="center">
<a href="pago?id=<?php echo $prox_contas->id_conta ?>&cond=<?php echo $prox_contas->id_cond ?>" class="btn btn-success">
<span class="glyphicon glyphicon-ok" title="Pago"></span>
</a>
<a href="edt-conta?id=<?php echo $prox_contas->id_conta ?>" class="btn btn-warning">
<span class="glyphicon glyphicon-pencil" title="Editar"></span>
</a>
<a href="remove_conta?id=<?php echo $prox_contas->id_conta ?>&cond=<?php echo $prox_contas->id_cond ?>" id="deletar" class="btn btn-danger ">
<span class="glyphicon glyphicon-trash" title="Excluir"></span>
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

<!--vencidas-->
<div role="tabpanel" class="tab-pane fade" id="vencidas" aria-labelledby="vencidas-tab">
<table class="table">
<thead>
<tr>
<th width="33%">Contas Vencidas</th>
<th width="27%">Data do Vencimento</th>
<th width="40%" align="center" style="text-align:center">Ações</th>
</tr>
</thead>
<tbody>
<?php
$query_venc_cont = "SELECT * FROM conta WHERE vencimento < curdate() AND status = 1 AND id_cond = '$id_cond'";
$result = $conn->query($query_venc_cont);
# Filtra através das linhas de consulta
while ($venc_contas = mysqli_fetch_object($result)) {

?>
 
<tr class="danger">
<td><?php echo $venc_contas->titulo_conta ?></td>
<td><?php
$originalDate_venc = $venc_contas->vencimento;
$newDate_venc = date("d/m/Y", strtotime($originalDate_venc));
echo $newDate_venc ?></td>
<td align="center">
<a href="pago?id=<?php echo $venc_contas->id_conta ?>&cond=<?php echo $venc_contas->id_cond ?>" class="btn btn-success">
<span class="glyphicon glyphicon-ok" title="Pago"></span>
</a>
<a href="edt-conta?id=<?php echo $venc_contas->id_conta ?>" class="btn btn-warning">
<span class="glyphicon glyphicon-pencil" title="Editar"></span>
</a>
<a href="remove_conta?id=<?php echo $venc_contas->id_conta ?>&cond=<?php echo $venc_contas->id_cond ?>" id="deletar" class="btn btn-danger ">
<span class="glyphicon glyphicon-trash" title="Excluir"></span>
</a>
</td>
</tr>
<?php } ?>


</tbody>
</table>
</div>

<!--pagas-->
<div role="tabpanel" class="tab-pane fade" id="pagas" aria-labelledby="pagas-tab">
<table class="table">
<thead>
<tr>
<th width="33%">Contas Pagas</th>
<th width="27%">Data do Vencimento</th>
<th width="40%" align="center" style="text-align:center">Ações</th>
</tr>
</thead>
<tbody>
<?php
$data_atual = date('d/m/y');
$query_pg_cont = "SELECT * from conta WHERE id_cond = '$id_cond' AND status = 0";
$result = $conn->query($query_pg_cont);
# Filtra através das linhas de consulta
while ($pg_contas = mysqli_fetch_object($result)) {

?>
 
<tr class="info">
<td><?php echo $pg_contas->titulo_conta ?></td>
<td><?php
$originalDate_pg = $pg_contas->vencimento;
$newDate_pg = date("d/m/Y", strtotime($originalDate_pg));
echo $newDate_pg ?></td>
<td align="center">
<a href="remove_conta?id=<?php echo $pg_contas->id_conta ?>&cond=<?php echo $pg_contas->id_cond ?>" id="deletar" class="btn btn-danger ">
<span class="glyphicon glyphicon-trash" title="Excluir"></span>
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

</div>
</div>
</div>
</div>
<!-- //tabs-->                     

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