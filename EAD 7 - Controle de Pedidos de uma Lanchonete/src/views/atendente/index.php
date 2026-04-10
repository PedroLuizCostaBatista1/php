<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include("../../utils/conexao.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="../../style/produtos.css">
    <title>Lanchonete - Atendente</title>
</head>
<body>
    <header>
        <h1>Menu da Lanchonete</h1>
        <a href="produtos.php">Visualizar a tabela de Produtos</a>
        <a href="../index.html">Sair</a>
    </header>
    <main>
        <section>
            <h2>Lista de pedidos</h2>

            <table>
                <thead>
                    <th>Codigo</th>
                    <th>Nome do Cliente</th>
                    <th>Nome do Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Data do Pedido</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    <?php
                        $comando = "
                            SELECT
                                p.id AS pedido_id,
                                p.nome_cliente,
                                p.data,
                                p.status,
                                pr.nome AS produto_nome,
                                ip.quantidade,
                                ip.preco
                            FROM
                                pedidos p
                                INNER JOIN itens_pedido ip ON p.id = ip.fkIdPedido
                                INNER JOIN produtos pr ON ip.fkIdProduto = pr.id
                            ORDER BY p.id;
                        ";

                        $resultado = $conexao -> query($comando);
                        if ($resultado -> num_rows > 0) {
                            while ($linha = $resultado -> fetch_assoc()) {
                                $dataFormata = date("d/m/Y H:i", strtotime($linha['data']));
                                
                                echo "<tr>";
                                echo "<td>#{$linha['pedido_id']}</td>";
                                echo "<td>{$linha['nome_cliente']}</td>";
                                echo "<td>{$linha['produto_nome']}</td>";
                                echo "<td>{$linha['quantidade']}</td>";
                                echo "<td>R$ " . number_format($linha['preco'], 2, ',', '.') . "</td>";
                                echo "<td>$dataFormata</td>";
                                echo "<td><span class='status-badge'>{$linha['status']}</span></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>Nenhum pedido encontrado.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>