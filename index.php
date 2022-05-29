<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <div class="cadastro">
            <div class="cadastro-form">
                <h1>Cadastro de Corretor</h1>
                <form id="form" action="script/inserir.php" method="post">
                    <section class="cpf-creci">
                        <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" maxlength="11" required>
                        <input type="text" id="creci" name="creci" placeholder="Digite seu Creci" minlength="2" required>
                    </section>

                    <input type="text" id="nome" name="nome" placeholder="Digite seu nome" minlength="2" required>

                    <button id="salvar-corretor" class="btn" value="submit" type="submit">Enviar</button>
                </form>
            </div>

            <?php
                // Abre conexão com banco de dados e lista cadastros
                $server = "localhost";
                $usuario = "root";
                $senha = "";
                $db = "thiago_brito";

                $conexao = mysqli_connect($server, $usuario, $senha);

                mysqli_select_db($conexao, $db) or die("Erro na abertura do banco de dados:<br>" . mysqli_error($conexao));

                $sql = "SELECT * FROM corretor ORDER BY id";
                $cadastros = mysqli_query($conexao, $sql);

                $linhas = mysqli_num_rows($cadastros);

                if ($linhas > 0) {

                echo '<div class="tabela-cadastro">';
                    echo '<table id="tabela">';
                        echo '<thead class="cabecalho">';
                            echo '<tr>';
                                echo '<th>ID</th>';
                                echo '<th>Nome</th>';
                                echo '<th>CPF</th>';
                                echo '<th>Creci</th>';
                                echo '<th rowspan="2">Ações</th>';
                            echo '</tr>';
                        echo '</thead>';
                        echo '<tbody class="tabela-corpo">';
                        
                        // Informações de cadastro
                            for($n=0; $n<$linhas;$n++) {
                                $dados = mysqli_fetch_array($cadastros);
                                $id = $dados["id"];
                                $nome = $dados["nome"];
                                $cpf = $dados["cpf"];
                                $creci = $dados["creci"];
                                
                                if($n % 2 ==0)
                                    echo "<tr>";
                                else
                                    echo "<tr bgcolor='#e2e2e2'>";
                                
                                echo "<td>$id</td>";
                                echo "<td>$nome</td>";
                                echo "<td>$cpf</td>";
                                echo "<td>$creci</td>";
                                echo "<td> 
                                        <a href='script/excluir.php?id=$id&nome=$nome'>Excluir</a>
                                        <a href='script/editar.php?id=$id&nome=$nome&cpf=$cpf&creci=$creci'>Editar</a>
                                    </td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>