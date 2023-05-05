<meta charset="utf-8">
<li>&nbsp;</li>
<?php
# Realiza a consulta na tabela
  $query_menu = "SELECT * from condominios ORDER BY nome_cond ASC";
  $result = $conn->query($query_menu);
  # Filtra atrav�s das linhas de consulta
  while ($menu = mysqli_fetch_object($result)) {
?>
	  <li style="font-size:15px;"><a href="condominio?id=<?php echo $menu->id_cond ?>"><i class="lnr lnr-apartment"></i><span><?php echo $menu->nome_cond ?></span></a></li>
<?php
	}  
?>

<li>&nbsp;</li>
<li><a href="settings"><i class="lnr lnr-cog"></i> <span>Configurações</span></a></li>
<li><a href="logout"><i class="lnr lnr-user"></i> <span>Sair</span></a></li>