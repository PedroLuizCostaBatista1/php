<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "12345678";
    $banco = "produtos";

    $conexao = new mysqli($host, $usuario, $senha, $banco);

    if ($conexao -> connect_error) {
        die("Erro na conexão: " . $conexao -> connect_error);
    }
?>