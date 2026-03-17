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
    <td width="18%" align="right">nota1:</td>
    <td width="26%"><input type="number" name="nota1" /></td>
    <td width="18%" align="right">nota2:</td>
    <td width="26%"><input type="number" name="nota2" /></td>



    <td width="21%"><input type="submit" name="botao" value="Alterar" /></td>
  </tr>
</table>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['botao']) && $_POST['botao'] == "Alterar") {
    $matricula = intval($_POST['matricula']);
    $nota1 = intval($_POST['nota1']);
    $nota2 = intval($_POST['nota2']);

    // Validação básica
    if ($matricula > 0) {

        if (!empty($nota1)) {
            mysqli_query($mysqli, "UPDATE aluno SET nota1='$nota1' WHERE matricula='$matricula'");
        }
        if (!empty($nota2)) {
            mysqli_query($mysqli, "UPDATE aluno SET nota2='$nota2' WHERE matricula='$matricula'");
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