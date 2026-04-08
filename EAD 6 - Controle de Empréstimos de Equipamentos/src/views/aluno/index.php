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
                        $comando = "SELECT e.*, emp.fkIdUsuario, emp.dataPrevista FROM equipamento e LEFT JOIN emprestimos emp ON e.id = emp.fkIdEquipamento AND e.estado = 'emprestado' GROUP BY e.id";
                        $resultado = $conexao -> query($comando);
                        if ($resultado -> num_rows > 0) {
                            while ($linha = $resultado -> fetch_assoc()) {
                                $solicitacao = "";
                                if ($linha['estado'] === "emprestado") {
                                    if ($linha['fkIdUsuario'] == $id) {
                                        $solicitacao = "
                                            <p>Data da devolução: {$linha['dataPrevista']}</p>
                                            <a href='../../controller/devolucao.php?id={$linha['id']}'>Devolver agora</a>
                                        ";
                                    } else {
                                        $solicitacao = "<p>Equipamento emprestado</p>";
                                    }
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