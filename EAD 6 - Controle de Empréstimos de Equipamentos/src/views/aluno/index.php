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
    <link rel="stylesheet" href="../../style/aluno.css">
    <title>Menu principal</title>
</head>
<body>
    <header>
        <h1>Menu principal</h1>
        <p>Bem-vindo de volta, <?php echo $usuario["nome"]?>!</p>
        <nav>
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
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $comando = "SELECT * FROM equipamento";
                        $comando2 = "SELECT dataReal FROM emprestimos WHERE fkIdUsuario = $id";
                        $resultado = $conexao -> query($comando);
                        $solicitacao = "";
                        if ($resultado -> num_rows > 0) {
                            while ($linha = $resultado -> fetch_assoc()) {
                                if ($linha['estado'] === "emprestado") {
                                    $resultadoData = $conexao -> query($comando2);
                                    $data = $resultadoData -> fetch_assoc();

                                    if () {

                                    }
                                    
                                    $solicitacao = "
                                        <p>Data da devolução: {$data['dataReal']}</p>
                                        <a href=''>Devolver agora</a>
                                    ";
                                } else {
                                    $solicitacao = "
                                        <a href='../../controller/emprestimo.php?id={$linha['id']}'>Solicitar um Emprestimo
                                        </a>
                                    ";
                                }

                                echo "
                                    <tr>
                                        <td>{$linha['id']}</td>
                                        <td>{$linha['nome']}</td>
                                        <td>{$linha['categoria']}</td>
                                        <td>{$linha['patrimonio']}</td>
                                        <td>{$linha['estado']}</td>
                                        <td>
                                            <div id='botoes'>
                                                $solicitacao
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