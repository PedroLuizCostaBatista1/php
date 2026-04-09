<?php
    include("../utils/conexao.php");

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $comando = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco=$preco WHERE id=$id";

    if ($conexao -> query($comando) === TRUE) {
        header("Location: ../views/atendente/produtos.php");
    } else {
        echo "Erro ao atualizar o produto.";
    }
?>