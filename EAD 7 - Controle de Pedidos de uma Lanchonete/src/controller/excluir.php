<?php
    include("../utils/conexao.php");

    $id = $_GET['id'];
    $comando = "DELETE FROM produtos WHERE id = $id";

    if ($conexao -> query($comando) === TRUE) {
        header("Location: ../views/atendente/produtos.php");
    } else {
        echo "Erro ao excluir o produto";
    }
?>