<html>
<head>
<title>Relatório de Clientes</title>
<?php include ('config.php');  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="clientelst.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan=5 align="center">Relatório de Clientes</td>
  </tr>
  <tr>
    <td width="18%" align="right">Nome:</td>
    <td width="26%"><input type="text" name="nome"  /></td>
    <td width="17%" align="right">Idade:</td>
    <td width="18%"><input type="text" name="idade" size="3" /></td>
    <td width="21%"><input type="submit" name="botao" value="Gerar" /></td>
  </tr>
</table>
</form>

<?php if (@$_POST['botao'] == "Gerar") { ?>

<table width="95%" border="1" align="center">
  <tr bgcolor="#9999FF">
    <th width="5%">C&oacute;d</th>
    <th width="30%">Nome</th>
    <th width="15%">Idade</th>
    <th width="12%">Sexo</th>
    <th width="12%">Telefone</th>
  </tr>

<?php

	$nome = $_POST['nome'];
	$idade = $_POST['idade'];
	
	$query = "SELECT *
			  FROM cliente 
			  WHERE id > 0 ";
	$query .= ($nome ? " AND nome LIKE '%$nome%' " : "");
	$query .= ($idade ? " AND idade = '$idade' " : "");
	$query .= " ORDER by id";
        $result = mysqli_query($mysqli, $query);

	while ($coluna=mysqli_fetch_array($result)) 
	{
		
	?>
    
    <tr>
      <th width="5%"><?php echo $coluna['id']; ?></th>
      <th width="30%"><?php echo $coluna['nome']; ?></th>
      <th width="15%"><?php echo $coluna['idade']; ?></th>
      <th width="12%"><?php echo $coluna['sexo']; ?></th>
      <th width="12%"><?php echo $coluna['telefone']; ?></th>
  	</tr>

    <?php
	
	} // fim while
?>
</table>
<?php	
}
?>

<a href="index.html" >Home </a>

</body>