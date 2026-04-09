<?php
    include("../utils/conexao.php");

    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];

    $comando = "INSERT INTO produtos (nome, descricao, preco) VALUES ('$nome', '$descricao', $preco)";

    if ($conexao -> query($comando) === TRUE) {
        header("Location: ../views/atendente/produtos.php");
    } else {
        echo "Erro no cadastro do produto";
    }
?>