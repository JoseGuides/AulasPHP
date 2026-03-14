<html>
<head>
<title>Relatório de Alunos</title>
<?php include ('config.php');  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="alunolst.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan=5 align="center">Relatório de Alunos</td>
  </tr>
  <tr>
    <td width="18%" align="right">Nome:</td>
    <td width="26%"><input type="text" name="nome"  /></td>
    <td width="17%" align="right">CPF:</td>
    <td width="18%"><input type="text" name="cpf" size="3" /></td>
    <td width="21%"><input type="submit" name="botao" value="Gerar" /></td>
  </tr>
</table>
</form>

<?php if (@$_POST['botao'] == "Gerar") { ?>

<table width="95%" border="1" align="center">
  <tr bgcolor="#9999FF">
    <th width="5%">Matricula</th>
    <th width="30%">Nome</th>
    <th width="15%">CPF</th>
    <th width="12%">Data NCTO</th>
  </tr>

<?php

	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	
	$query = "SELECT *
			  FROM aluno 
			  WHERE matricula > 0 ";
	$query .= ($nome ? " AND nome LIKE '%$nome%' " : "");
	$query .= ($cpf ? " AND cpf = '$cpf' " : "");
	$query .= " ORDER by matricula";
        $result = mysqli_query($mysqli, $query);

	while ($coluna=mysqli_fetch_array($result)) 
	{
		
	?>
    
    <tr>
      <th width="5%"><?php echo $coluna['matricula']; ?></th>
      <th width="30%"><?php echo $coluna['nome']; ?></th>
      <th width="15%"><?php echo $coluna['cpf']; ?></th>
      <th width="12%"><?php echo $coluna['data_ncto']; ?></th>
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