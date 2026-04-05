<?php
    include("../utils/conexao.php");

    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $estoque = $_POST["quantidade"];
    $descricao = $_POST["descricao"];

    $comando = "INSERT INTO produtos (nome, descricao, preco, estoque) VALUES ('$nome', '$descricao', '$preco', '$estoque')";

    if ($conexao -> query($comando) === TRUE) {
        header("Location: ../views/index.php");
    } else {
        echo "Erro ao cadastrar o produto.";
    }
?>