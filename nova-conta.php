<?php
require_once('config/connection.php');

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
$( function() {
    $( "#datepicker2" ).datepicker( $.datepicker.regional[ "pt_BR" ] );
    $( "#locale" ).on( "change", function() {
      $( "#datepicker2" ).datepicker( "option",
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
<h3 class="blank1">Cadastrar conta</h3>
<div class="xs"></div>
<!-- tabs-->
<div class="grid_3 grid_5">
<div class="but_list">
	<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
		<ul id="myTab" class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#novaconta" id="novaconta-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Conta Simples</a></li>
			<li role="presentation" class=""><a href="#recorrente" role="tab" id="recorrente-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Conta Recorrente</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade active in" id="novaconta" aria-labelledby="novaconta-tab">
				<p>
					<form class="com-mail panel-body"  action="cad_simples.php" method="post">
						<div class="col-md-12">
							<input name="id_conta" type="hidden" id="id_conta">
							<input name="status" type="hidden" id="status" value="1">
							<div class="col-md-12">
								<label>Titulo: </label>
								<input name="titulo" type="text" class="form-control1 control3" id="titulo" placeholder="Titulo">
							</div>
							<div class="col-md-3">
								<label>Valor :  </label>
								<input name="valor" type="text" class="form-control1 control3 col-md-4" id="valor" placeholder="ex.: 10,00">
							</div>
							<div class="col-md-3">
								<label>Dia Vencimento :  </label>
								<input name="datepicker" type="text" class="form-control1 control3 col-md-4" id="datepicker">
							</div>
							<div class="col-md-3">
								<label>Condominio :  </label>
								<select name="condominio" class="form-control1 control3 col-md-4 input-group-btn">
									<option>Selecione um Condominio</option>
									<?php
										# Realiza a consulta na tabela
										$query_cond = "SELECT * from condominios ORDER BY nome_cond ASC";
										$result = $conn->query($query_cond);
										# Filtra atrav�s das linhas de consulta
										while ($cond = mysqli_fetch_object($result)) {
                                    ?>
                                    <option value="<?php echo $cond->id_cond ?>"><?php echo $cond->nome_cond ?></option>
                                    <?php
                                    	}  
                                    ?>
								</select>
							</div><br>
							<div class="col-md-3">
								<label>Nº de Parcelas </label>
								<input name="parcela" type="text" class="form-control1 control3 col-md-4" placeholder="ex.: 3">
							</div>
						</div>			
						<br>
						<div class="col-md-12" style="margin-left:12px; margin-top:20px;">
						<input type="submit" value="Cadastrar">
						</div>                       				
					</form>
				</p>
			</div>
<div role="tabpanel" class="tab-pane fade" id="recorrente" aria-labelledby="recorrente-tab">
<p><spam style="font-size:10px; color:#DC143C; font-style: italic; font-weight:bold;"> (Ex. Água, Luz, Telefone, Internet)</spam>
<form class="com-mail panel-body" action="cad_recorrente.php" method="post">
<div class="col-md-12">
<input name="id_conta" type="hidden" id="id_conta">
<input name="status" type="hidden" id="status" value="1">
<input name="parcela" type="hidden" id="parcela" value="60">
<div class="col-md-12">
<label>Titulo: </label>
<input name="titulo" type="text" class="form-control1 control3" id="titulo" placeholder="Titulo">
</div>
<div class="col-md-4">
<label>Valor :  </label>
<input name="valor" type="text" class="form-control1 control3 col-md-4" id="valor">
</div>
<div class="col-md-4">
<label>Dia Vencimento :  </label>
<input name="datepicker2" type="text" class="form-control1 control3 col-md-4" id="datepicker2">
</div>
<div class="col-md-4">
<label>Condominio :  </label>
<select name="condominio" class="form-control1 control3 col-md-4 input-group-btn">
<option>Selecione um Condominio</option>
<?php
# Realiza a consulta na tabela
  $query_cond = "SELECT * from condominios ORDER BY nome_cond ASC";
  $result = $conn->query($query_cond);
  # Filtra atrav�s das linhas de consulta
  while ($cond = mysqli_fetch_object($result)) {
?>
<option value="<?php echo $cond->id_cond ?>"><?php echo $cond->nome_cond ?></option>
<?php
	}  
?>

</select>
</div><br>
</div>
<br>
<div class="col-md-12" style="margin-left:12px; margin-top:20px;">
<input type="submit" name="cadrecorrente" value="Cadastrar">
</div>                       				
</form>
</p>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<!-- //tabs--> 
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