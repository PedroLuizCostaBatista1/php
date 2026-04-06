<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/cadastro.css">
    <title>Entrar - Controle de Empréstimos</title>
</head>
<body>
    <main>
        <a href="index.html">Voltar</a>
        <h1>Login</h1>
        <form action="../controller/entrar.php" method="post">
            <div>
                <label for="nome">E-mail:</label>
                <input type="email" name="email" placeholder="E-mail completo" required>
            </div>

            <?php
                $login = $_GET["login"] ?? "";

                if ($login) {
                    echo "
                        <p style='color: red'>E-mail incorreto. Tente novamente</p>
                    ";
                }
            ?>

            <button type="submit">Entrar</button>
            <button type="reset">Limpar</button>
        </form>
    </main>
</body>
</html>