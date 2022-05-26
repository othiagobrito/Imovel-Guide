<?php

// Captura dados do formulário
$id = $_GET["id"];

// Abre conexão com banco de dados e envia dados
$server = "localhost";
$usuario = "root";
$senha = "";
$db = "thiago_brito";

$conexao = mysqli_connect($server, $usuario, $senha);

mysqli_select_db($conexao, $db) or die("Erro na abertura do banco de dados:<br>" . mysqli_error($conexao));

$sql = "DELETE FROM corretor WHERE id=$id";

mysqli_query($conexao, $sql) or die("Erro: " . mysqli_error($conexao));

?>

<script>
      window.location.href = "../index.php";
</script>