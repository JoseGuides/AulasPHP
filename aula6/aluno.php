<html>

<head>
<title>Cadastro de Alunos</title>

<?php include ('config.php');  ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="aluno.php" method="post" name="aluno">
<table width="200" border="1">
  <tr>
    <td colspan="2">Cadastro de Alunos</td>
  </tr>
  <tr>
    <td width="53">Mat.</td>
    <td width="131">&nbsp;
  </tr>
  <tr>
    <td>Nome:</td>
    <td><input type="text" name="nome" ></td>
  </tr>
  <tr>
    <td>CPF:</td>
    <td><input type="text" name="cpf" ></td>
  </tr>
  <tr>
    <td>Data Nascimento:</td>
    <td><input type="date" name="data_ncto" ></td>
  </tr>
  
    <tr>
    <td>Nota 1:</td>
    <td><input type="number" name="nota1" ></td>
  </tr>
  <tr>
    <td>Nota2:</td>
    <td><input type="number" name="nota2" ></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input type="submit" value="Gravar" name="botao"></td>
    </tr>	
</table>
</form>

<?php
if (@$_POST['botao'] == "Gravar") 
	{
		
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$data_ncto = $_POST['data_ncto'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
	
		
		$insere = "INSERT into aluno (nome, cpf, data_ncto, nota1, nota2) 
    VALUES ('$nome', '$cpf', '$data_ncto', '$nota1', '$nota2')";
		mysqli_query($mysqli, $insere) or die ("Não foi possivel inserir os dados");
	}

?>

<a href="index.html" >Home </a>
</body>
</html>