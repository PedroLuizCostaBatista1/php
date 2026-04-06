<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include('../utils/conexao.php');

        $id = $_GET['id'];
        $comando = "SELECT * FROM produtos WHERE id = $id";
        $resultado = $conexao -> query($comando);
        $produto = $resultado -> fetch_assoc();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Editar o Produto</title>
</head>
<body>
    <main>
        <form action="../controller/editar.php" method="post">
            <h2>Atualizar o produto</h2>
            <input type="hidden" name="id" value="<?php echo $produto['id'] ?>">
            <div>
                <label for="nome">Nome do produto</label>
                <input type="text" name="nome" placeholder="Nome do produto"
                value="<?php echo $produto['nome'] ?>" required>
            </div>
            <div>
                <label for="preco">Preço do produto</label>
                <input type="number" name="preco" step="any" value="<?php echo $produto['preco'] ?>" placeholder="R$ 0,00" required>
            </div>
            <div>
                <label for="quantidade">Quantidade do produto</label>
                <input type="number" name="quantidade" value="<?php echo $produto['estoque'] ?>" placeholder="0" required>
            </div>
            <div>
                <label for="descricao">Descrição do produto</label>
                <input type="text" name="descricao" value="<?php echo $produto['descricao'] ?>" placeholder="Descrição do produto" required>
            </div>
            <div id="botoes">
                <button id="botao-submit" type="submit">Atualizar</button>
            </div>
        </form>
    </main>
</body>
</html>