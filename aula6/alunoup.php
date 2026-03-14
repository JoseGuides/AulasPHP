<html>
<head>
<title>Alteração de Aulunos</title>
<?php include ('config.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="alunoup.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan="5" align="center">Alteração de Alunos</td>
  </tr>
  <tr>
    <td width="18%" align="right">matricula:</td>
    <td width="26%"><input type="number" name="matricula" /></td>
    <td width="18%" align="right">Nome:</td>
    <td width="26%"><input type="text" name="nome" /></td>
    <td width="18%" align="right">data_ncto:</td>
    <td width="26%"><input type="date" name="data_ncto" /></td>
    <td width="21%"><input type="submit" name="botao" value="Alterar" /></td>
  </tr>
</table>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['botao']) && $_POST['botao'] == "Alterar") {
    $matricula = intval($_POST['matricula']);
    $data_ncto = intval($_POST['data_ncto']);
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);

    // Validação básica
    if ($matricula > 0) {
        // Atualiza a data_ncto se for fornecida
        if ($data_ncto > 0) {
            mysqli_query($mysqli, "UPDATE aluno SET data_ncto='$data_ncto' WHERE matricula='$matricula'");
        }

        // Atualiza o nome se for fornecido
        if (!empty($nome)) {
            mysqli_query($mysqli, "UPDATE aluno SET nome='$nome' WHERE matricula='$matricula'");
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($mysqli);
    } else {
        echo "matricula inválido.";
    }
}
?>

<a href="index.html">Home</a>
</body>
</html>