<?php
    include('../utils/conexao.php');

    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $patrimonio = $_POST["patrimonio"];

    $comando = "INSERT INTO equipamento (nome, categoria, patrimonio) VALUES ('$nome', '$categoria', '$patrimonio')";

    if ($conexao -> query($comando) === TRUE) {
        header("Location: ../views/professor/index.php");
    } else {
        echo "Erro ao cadastrar o produto.";
    }
?>