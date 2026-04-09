<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include('../../utils/conexao.php');
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/produtos.css">
    <title>Produtos da Lanchonete</title>
</head>
<body>
    <main>
        <header>
            <h1>Produtos da Lanchonete</h1>
            <a href="index.php">Voltar</a>
        </header>

        <section>
            <table>
                <thead>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php
                        $comando = "SELECT * FROM produtos";
                        $resultado = $conexao -> query($comando);
                        if ($resultado -> num_rows > 0) {
                            while ($linha = $resultado -> fetch_assoc()) {
                                echo "
                                    <tr>
                                        <td>{$linha['id']}</td>
                                        <td>{$linha['nome']}</td>
                                        <td>R$ " .  number_format($linha['preco'], 2, ',', '.') . "</td>
                                        <td>{$linha['descricao']}</td>
                                        <td>
                                            <div id='botoes'>
                                                <a href='editar.php?id={$linha['id']}'>Editar</a>
                                                <a href='../../controller/excluir.php?id={$linha['id']}'>Excluir</a>
                                            </div>
                                        </td>
                                    </tr>
                                ";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>