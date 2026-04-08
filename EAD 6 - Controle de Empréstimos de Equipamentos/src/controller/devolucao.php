<?php
    include('../utils/conexao.php');
    session_start();

    $idEquipamento = $_GET["id"];
    $idUsuario = session_id();
    $dataAtual = date('Y-m-d');

    $comando = "UPDATE emprestimos SET status='devolvido', dataReal='$dataAtual' WHERE fkIdUsuario=$idUsuario AND fkIdEquipamento=$idEquipamento";
    $comando2 = "UPDATE equipamento SET estado='disponivel' WHERE id=$idEquipamento";

    if ($conexao -> query($comando) === TRUE and $conexao -> query($comando2) === TRUE) {
        header("Location: ../views/aluno/index.php");
    } else {
        echo "Erro ao solicitar um emprestimo";
    }
?>