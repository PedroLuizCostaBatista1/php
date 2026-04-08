<?php
    include("../utils/conexao.php");
    session_start();

    $idUsuario = session_id();
    $idEquipamento = $_GET["id"];
    $dataAtual = date('Y-m-d');
    $dataPrevista = date('Y-m-d', strtotime('+2 weeks'));

    $comando = "INSERT INTO emprestimos (fkIdUsuario, fkIdEquipamento, dataEmprestimo, dataPrevista) VALUES ($idUsuario, $idEquipamento, '$dataAtual', '$dataPrevista')";
    $comando2 = "UPDATE equipamento SET estado='emprestado' WHERE id=$idEquipamento";

    if ($conexao -> query($comando) === TRUE and $conexao -> query($comando2) === TRUE) {
        header("Location: ../views/aluno/index.php");
    } else {
        echo "Erro ao solicitar um emprestimo";
    }
?>