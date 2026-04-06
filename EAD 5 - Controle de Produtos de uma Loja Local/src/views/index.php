<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include("../utils/conexao.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Sistema de vendas</title>
</head>
<body>
    <header>
        <h1>Controle de Produtos</h1>
        <p>Gerencie todas as operações do seu negócio em um único lugar</p>
    </header>
    <main>
        <form action="../controller/controller.php" method="post">
            <h2>Novo produto</h2>

            <div>
                <label for="nome">Nome do produto</label>
                <input type="text" name="nome" placeholder="Nome do produto" required>
            </div>

            <div>
                <label for="preco">Preço do produto</label>
                <input type="number" name="preco" step="any" placeholder="R$ 0,00" required>
            </div>

            <div>
                <label for="quantidade">Quantidade do produto</label>
                <input type="number" name="quantidade" placeholder="0" required>
            </div>

            <div>
                <label for="descricao">Descrição do produto</label>
                <input type="text" name="descricao" placeholder="Descrição do produto" required>
            </div>

            <div id="botoes">
                <button id="botao-submit" type="submit">Adicionar</button>
                <button id="botao-reset" type="reset">Limpar</button>
            </div>
        </form>
        <section>
            <h2>Lista de Produtos</h2>

            <div id="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
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
                                        <td>{$linha['estoque']}</td>
                                        <td>{$linha['descricao']}</td>
                                        <td>
                                            <div id='botoes'>
                                                <a href='editar.php?id={$linha['id']}'>Editar</a>
                                                <a href='../controller/excluir.php?id={$linha['id']}'>Excluir</a>
                                            </div>
                                        </td>
                                    </tr>
                                ";
                            }
                        }
                    ?>
                </table>
            </div>
        </section>
    </main>
</body>
</html>