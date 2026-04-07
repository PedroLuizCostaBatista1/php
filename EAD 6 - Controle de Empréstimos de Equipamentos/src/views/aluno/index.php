<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include('../../utils/conexao.php');

        $id = $_GET['id'];
        $comando = "SELECT * FROM usuario WHERE id = $id";
        $resultado = $conexao -> query($comando);
        $usuario = $resultado -> fetch_assoc();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/aluno.css">
    <title>Menu principal</title>
</head>
<body>
    <header>
        <h1>Menu principal</h1>
        <p>Bem-vindo de volta, <?php echo $usuario["nome"]?>!</p>
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
                        <th>Estado</th>
                        <th>Ações</th>
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
                                        <td>{$linha['estado']}</td>
                                        <td>
                                            <div id='botoes'>
                                                <a href=''>Solicitar um Emprestimo</a>
                                            </div>
                                        </td>
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