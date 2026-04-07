<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        $id = $_GET['id'];
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/cadastro.css">
    <title>Equipamento</title>
</head>
<body>
    <main>
        <a href="index.php?id=<?php echo $id ?>">Voltar</a>
        <h1>Cadastro de equipamento</h1>
        <form action="../../controller/equipamento.php" method="post">
            <div>
                <label for="nome">Nome do equipamento</label>
                <input type="text" name="nome" placeholder="Nome do equipamento" required>
            </div>
            <div>
                <label for="nome">Categoria do equipamento</label>
                <input type="text" name="categoria" placeholder="Categoria do equipamento" required>
            </div>
            <div>
                <label for="nome">Patrimonio do equipamento</label>
                <input type="number" name="patrimonio" placeholder="Patrimonio do equipamento" required>
            </div>

            <button type="submit">Cadastrar</button>
            <button type="reset">Limpar</button>
        </form>
    </main>
</body>
</html>