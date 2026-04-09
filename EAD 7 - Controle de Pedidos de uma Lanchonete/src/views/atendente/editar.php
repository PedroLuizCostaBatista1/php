<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include('../../utils/conexao.php');

        $id = $_GET['id'];
        $comando = "SELECT * FROM produtos WHERE id = $id";
        $resultado = $conexao -> query($comando);
        $produto = $resultado -> fetch_assoc();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/cadastro.css">
    <title>Editar o Produto</title>
</head>
<body>
    <main>
        <a href="index.php">Voltar</a>
        <h1>Editar o Produto</h1>

        <form action="../../controller/editar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $produto['id'] ?>">
            <div>
                <label for="nome">Nome do Produto</label>
                <input type="text" name="nome" value="<?php echo $produto['nome'] ?>" required>
            </div>

            <div>
                <label for="preco">Preço do Produto</label>
                <input type="number" name="preco" step="any" value="<?php echo $produto['preco'] ?>" required>
            </div>

            <div>
                <label for="descricao">Descrição do Produto</label>
                <input type="text" value="<?php echo $produto['descricao'] ?>" name="descricao">
            </div>

            <button type="submit">Atualizar</button>
            <button type="reset">Limpar</button>
        </form>
    </main>
</body>
</html>