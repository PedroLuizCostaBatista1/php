<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include('../../utils/conexao.php');
        session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/professor.css">
    <title>Emprestimos</title>
</head>
<body>
    <main>
        <section>
            <h1>Emprestimos dos Alunos</h1>
            <a href="index.php">Voltar</a>
            <table>
                <thead>
                    <tr>
                        <th>Codigo do Emprestimo</th>
                        <th>Nome do Usuario</th>
                        <th>Nome do Equipamento</th>
                        <th>Data da Retirada</th>
                        <th>Data Previa da Devolução</th>
                        <th>Data da Devolução</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $comando = "SELECT emp.id, usu.nome, equip.nome AS nomeEquipamento, emp.dataEmprestimo, emp.dataPrevista, emp.dataReal, emp.status FROM emprestimos AS emp INNER JOIN usuario as usu ON emp.fkIdUsuario = usu.id INNER JOIN equipamento as equip ON emp.fkIdEquipamento = equip.id";
                        $resultado = $conexao -> query($comando);
                        if ($resultado -> num_rows > 0) {
                            while ($linha = $resultado -> fetch_assoc()) {
                                echo "
                                    <tr>
                                        <td>{$linha['id']}</td>
                                        <td>{$linha['nome']}</td>
                                        <td>{$linha['nomeEquipamento']}</td>
                                        <td>{$linha['dataEmprestimo']}</td>
                                        <td>{$linha['dataPrevista']}</td>
                                        <td>{$linha['dataReal']}</td>
                                        <td>{$linha['status']}</td>
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