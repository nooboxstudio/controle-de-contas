<form class="com-mail panel-body" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<div class="col-md-12">
<input name="id_conta" type="hidden" id="id_conta">
<input name="status" type="hidden" id="status" value="1">
<input name="parcela" type="hidden" id="parcela" value="10">
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
<input name="vencimento" type="text" class="form-control1 control3 col-md-4" id="datepicker2">
</div>
<div class="col-md-4">
<label>Condominio :  </label>
<select name="condominio" class="form-control1 control3 col-md-4 input-group-btn">
<option>Selecione um Condominio</option>
<option value="01">Condominio 01</option>
<option value="02">Condominio 02</option>
<option value="03">Condominio 31</option>
</select>
</div><br>
</div>
<br>
<div class="col-md-12" style="margin-left:12px; margin-top:20px;">
<input type="submit" name="cadrecorrente" value="Cadastrar">
</div>                                     
</form>
<!--end-formulario-->
 
<!--cad_recorrente.php-->
<?php

global $conn;

 // include("Connections/conn.php");
  
   
  
  
  
  
  $titulo = $_POST['titulo'];
 $valor = $_POST['valor'];
 $condominio = $_POST['condominio'];
 $status = $_POST['status'];
 $vencimento =  $_POST['vencimento'];
 $parcela  =   $_POST['parcela'];
 
 
     $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (!empty($form)):
                if (!$form['titulo']):
                    echo "Preencha titulo";
                elseif (!$form['valor']):
                    echo "Preencha o valor";
                elseif (!$form['condominio']):
                    echo "Preencha o condominio";
                
                   elseif (!$form['status']):
                    echo "Preencha o status";
                    elseif (!$form['vencimento']):
                    echo "Preencha o vencimento";
                      elseif (!$form['parcela']):
                    echo "Preencha o parcelas";
                
            
          
            else :
     
 
  //$insert = mysql_query("INSERT INTO conta(id_conta, titulo_conta,vencimento,valor,status,id_cond) VALUES( ";
    for($i=0;$i<=$parcela-1;$i++){
    $cad = date("Y-m-d", strtotime(str_replace("/", "-", $vencimento)."+$i month"));
    {
      // $insert ="(NULL,'$titulo','$cad','$valor','$status','$condominio')";}
        
     

             
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "controle-de-contas";
     
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  $sql = "INSERT INTO `conta`(`titulo_conta`,`vencimento`,`valor`,`status`,`id_cond`) VALUES('$titulo','$cad','$valor','$status','$condominio')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//$result =   $mysqli->query($sql); 






   


     
  
 
 






//print_r($result);
     echo 'inserido';   
      }      }
  
     
       
                endif;
                  
              endif;
                
                
           
       
  
   
  
     //end if

?>