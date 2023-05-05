<?php
global $conn;
$titulo = $_POST['titulo'];
$valor = $_POST['valor'];
$condominio = $_POST['condominio'];
$status = $_POST['status'];
$vencimento =  $_POST['datepicker'];
$parcela  =   $_POST['parcela'];
    for($i=0;$i<=$parcela-1;$i++){
    $cad = date("Y-m-d", strtotime(str_replace("/", "-", $vencimento)."+$i month"));
    {
		include('config/connection.php');
  $sql = "INSERT INTO `conta`(`titulo_conta`,`vencimento`,`valor`,`status`,`id_cond`) VALUES('$titulo','$cad','$valor','$status','$condominio')";


if ($conn->query($sql) === TRUE) {
      header('Location:nova-conta');
} else {
	 $errormsg="Error: " . $sql . "<br>" . $conn->error;
      echo "<script type='text/javascript'>alert('$errormsg');</script>";
}

$conn->close();
     
	  }      }
  
     
       
                  
?>