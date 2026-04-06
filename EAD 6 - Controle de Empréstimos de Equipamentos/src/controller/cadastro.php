<?php
    include("../utils/conexao.php");

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $tipo = $_POST["tipo"];

    $comando = "INSERT INTO usuario (nome, email, telefone, tipo) VALUES ('$nome', '$email', '$telefone', '$tipo')";

    if ($conexao -> query($comando) === TRUE) {
        echo "
            <body style='text-align: center'>
                <h1>Cadastro realizado com sucesso!</h1>
                <a href='../views/index.html'>Voltar ao Inicio</a>
            </body>
        ";
    } else {
        echo "Erro ao cadastrar o usuario";
    }
?>