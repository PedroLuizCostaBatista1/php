<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include('../../utils/conexao.php');
        session_start();
        $id = session_id();

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
            <a href="equipamento.php">Adicionar equipamento</a>
            <a href="emprestimo.php">Ver detalhes dos equipamentos</a>
            <a href="../../controller/logout.php">Sair</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>Lista de equipamentos</h2>

            <table>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Patrimonio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $comando = "SELECT * FROM equipamento";
                        $resultado = $conexao -> query($comando);
                        if ($resultado -> num_rows > 0) {
                            while ($linha = $resultado -> fetch_assoc()) {
                                echo "
                                    <tr>
                                        <td>{$linha['id']}</td>
                                        <td>{$linha['nome']}</td>
                                        <td>{$linha['categoria']}</td>
                                        <td>{$linha['patrimonio']}</td>
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