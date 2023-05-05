<?php
$titulo = $_POST['titulo'];
$valor = $_POST['valor'];
$vencimento = $_POST['dia'];
$condominio = $_POST['condominio'];

$contas = array();
$parcelas = "60";
for($i=0;$i<=$parcelas-1;$i++){
$cad = date("Y/m/d", strtotime(str_replace("/", "-", $vencimento)."+$i month"));	
?>
<?php $contas[] = array('titulo_conta' => $titulo, 'vencimento' => $cad, 'valor' => $valor, 'status' => '1', 'id_cond' => $condominio);?>

<?php }
// Início da consulta
$sql = "INSERT INTO 'contas' ('id_conta', 'titulo_conta', 'vencimento','valor','status','id_cond') VALUES";
// Para cada elemento de $usuários, faça:
foreach ($contas as $conta) {
  $tit = $conta['titulo_conta'];
  $venc = $conta['vencimento'];
  $vl = $conta['valor'];
  $stat = $conta['status'];
  $cond_id = $conta['id_cond'];
  // Monta a parte consulta de cada usuário
  $sql .= " (NULL, '{$tit}', '{$venc}'),'{$vl}, '{$stat}, '{$cond_id}";
}
// Tira o último caractere (vírgula extra)
$sql = substr($sql, 0, -1);
// Executa a consulta
mysql_query($sql);
// Pega o número de registros inseridos
header('Location: nova-conta');

?>