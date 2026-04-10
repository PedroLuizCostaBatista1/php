<?php
include("../utils/conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $sqlPedido = "INSERT INTO pedidos (nome_cliente) VALUES ('$nome')";
    
    if (mysqli_query($conexao, $sqlPedido)) {
        $idPedido = mysqli_insert_id($conexao);
        $totalGeral = 0;

        foreach ($_POST['quantidade'] as $idProduto => $quantidade) {
            $quantidade = (int) $quantidade;

            if ($quantidade > 0) {
                $preco = $_POST['preco'][$idProduto];
                $subtotal = $quantidade * $preco;
                $totalGeral += $subtotal;

                $sqlItem = "INSERT INTO itens_pedido (fkIdPedido, fkIdProduto, quantidade, preco) 
                            VALUES ($idPedido, $idProduto, $quantidade, '$preco')";
                
                mysqli_query($conexao, $sqlItem);
            }
        }

        echo "<h1>Pedido finalizado com sucesso!</h1>";
        echo "<p>Total: R$ " . number_format($totalGeral, 2, ',', '.') . "</p>";
        echo "<a href='../views/cliente/index.php'>Novo Pedido</a>";
        
    } else {
        echo "Erro ao processar pedido: " . mysqli_error($conexao);
    }
}
?>