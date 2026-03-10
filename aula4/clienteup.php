<html>
<head>
<title>Alteração de Clientes</title>
<?php include ('config.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="clienteup.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan="5" align="center">Alteração de Clientes</td>
  </tr>
  <tr>
    <td width="18%" align="right">id:</td>
    <td width="26%"><input type="number" name="id" /></td>
    <td width="18%" align="right">Nome:</td>
    <td width="26%"><input type="text" name="nome" /></td>
    <td width="18%" align="right">Idade:</td>
    <td width="26%"><input type="number" name="idade" /></td>
    <td width="21%"><input type="submit" name="botao" value="Alterar" /></td>
  </tr>
</table>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['botao']) && $_POST['botao'] == "Alterar") {
    $id = intval($_POST['id']);
    $idade = intval($_POST['idade']);
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);

    // Validação básica
    if ($id > 0) {
        // Atualiza a idade se for fornecida
        if ($idade > 0) {
            mysqli_query($mysqli, "UPDATE cliente SET idade='$idade' WHERE id='$id'");
        }

        // Atualiza o nome se for fornecido
        if (!empty($nome)) {
            mysqli_query($mysqli, "UPDATE cliente SET nome='$nome' WHERE id='$id'");
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($mysqli);
    } else {
        echo "ID inválido.";
    }
}
?>

<a href="index.html">Home</a>
</body>
</html>