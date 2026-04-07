<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include('../../utils/conexao.php');

        $id = $_GET['id'] ?? "";
        $comando = "SELECT * FROM usuario WHERE id = $id";
        $resultado = $conexao -> query($comando);
        $usuario = $resultado -> fetch_assoc();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/professor.css">
    <title>Menu principal</title>
</head>
<body>
    <header>
        <h1>Menu principal</h1>
        <p>Olá professor <?php echo $usuario["nome"]?>! Bem-vindo de volta!</p>
        <nav>
            <a href="equipamento.php?id=<?php echo $usuario["id"] ?>">Adicionar equipamento</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>Lista de equipamentos</h2>
        </section>
    </main>
</body>
</html>