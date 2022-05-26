<?php

// Captura dados do formulário
$id = $_POST["id"];
$cpf = $_POST["cpf"];
$creci = $_POST["creci"];
$nome = $_POST["nome"];

// Trata os dados
$checa_nome = strlen($nome) >= 2;
$checa_creci = strlen($creci) >= 2;
$checa_cpf = strlen($cpf) == 11;

if ($checa_nome && $checa_creci && $checa_cpf) {
    // Abre conexão com banco de dados e envia dados
    $server = "localhost";
    $usuario = "root";
    $senha = "";
    $db = "thiago_brito";

    $conexao = mysqli_connect($server, $usuario, $senha);

    mysqli_select_db($conexao, $db) or die("Erro na abertura do banco de dados:<br>" . mysqli_error($conexao));

    $sql = "UPDATE corretor SET nome='$nome', cpf='$cpf', creci='$creci' WHERE id=$id";

    mysqli_query($conexao, $sql) or die("Erro: " . mysqli_error($conexao));
}

?>

<script>
      window.location.href = "../index.php";
</script>