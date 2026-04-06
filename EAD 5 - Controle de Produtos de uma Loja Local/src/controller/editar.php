<?php
    include("../utils/conexao.php");

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    $descricao = $_POST['descricao'];

    $comando = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco', estoque='$estoque' WHERE id=$id";

    if ($conexao -> query($comando) === TRUE) {
        header("Location: ../views/index.php");
    } else {
        echo "Erro ao atualizar o produto.";
    }
?>