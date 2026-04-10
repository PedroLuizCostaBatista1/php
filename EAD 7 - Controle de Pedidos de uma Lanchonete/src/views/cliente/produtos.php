<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include("../../utils/conexao.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/cliente.css">
    <title>Lanchonete - Cliente</title>
</head>
<body>
    <main>
        <header>
            <a href="../index.html">Voltar</a>
            <h1>Novo Pedido</h1>
        </header>
        <form action="../../controller/pedido.php" method="post">
            <div>
                <?php
                    $comando = "SELECT * FROM produtos";
                    $resultado = $conexao -> query($comando);
                    if ($resultado -> num_rows > 0) {
                        while ($linha = $resultado -> fetch_assoc()) {
                            echo "
                                <label>{$linha['nome']} (R$ {$linha['preco']})</label>
                                <input type='number' name='quantidade[{$linha['id']}]' value='0' min='0'>
                                <input type='hidden' name='preco[{$linha['id']}]' value='{$linha['preco']}'>
                            ";
                        }
                    }
                ?>
            </div>

            <button type="submit">Finalizar o Pedido</button>
        </form>
    </main>
</body>
</html>