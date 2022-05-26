<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro</title>

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <?php
            // Armazena variáveis
            $id = $_GET["id"];
            $nome = $_GET["nome"];
            $cpf = $_GET["cpf"];
            $creci = $_GET["creci"];

            echo "<div class='cadastro'>";
                echo "<div class='cadastro-form'>";
                    echo "<h1>Editar cadastro de Corretor</h1>";
                    echo "<form id='form' action='alterar.php' method='post'>";
                        echo "<section class='cpf-creci'>";
                            echo "<input type='text' id='cpf' name='cpf' placeholder='Digite seu CPF' maxlength='11' value='$cpf' required>";
                            echo "<input type='text' id='creci' name='creci' placeholder='Digite seu Creci' minlength='2' value='$creci' required>";
                        echo "</section>";

                        echo "<input type='text' id='nome' name='nome' placeholder='Digite seu nome' minlength='2' value='$nome' required>";

                        echo "<input type='text' id='id' name='id' value='$id' style='display:none'>";

                        echo "<button id='salvar-corretor' class='btn' value='submit' type='submit'>Alterar</button>";
                    echo "</form>";
                echo "</div>";
            ?>
    </main>

</body>
</html>