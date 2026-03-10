<html>

<head>
<title>Cadastro de Clientes</title>

<?php include ('config.php');  ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="cliente.php" method="post" name="cliente">
<table width="200" border="1">
  <tr>
    <td colspan="2">Cadastro de Clientes</td>
  </tr>
  <tr>
    <td width="53">Cod.</td>
    <td width="131">&nbsp;
  </tr>
  <tr>
    <td>Nome:</td>
    <td><input type="text" name="nome" ></td>
  </tr>
  <tr>
    <td>Idade:</td>
    <td><input type="text" name="idade" ></td>
  </tr>
  <tr>
    <td>Sexo:</td>
    <td><input type="radio" name="sexo" value="M"> Masc
    <input type="radio" name="sexo" value="F"> Fem   
    </td>
  </tr>
  <tr>
    <td>Telefone:</td>
    <td><input type="text" name="telefone" ></td>
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
		$idade = $_POST['idade'];
		$sexo = $_POST['sexo'];
		$telefone = $_POST['telefone'];
		
		$insere = "INSERT into cliente (nome, idade, sexo, telefone) 
    VALUES ('$nome', '$idade', '$sexo', '$telefone')";
		mysqli_query($mysqli, $insere) or die ("Não foi possivel inserir os dados");
	}

?>

<a href="index.html" >Home </a>
</body>
</html>