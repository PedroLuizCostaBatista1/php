<?php
    include('../utils/conexao.php');

    $email = $_POST["email"];
    $comando = "SELECT * FROM usuario WHERE email = '$email'";
    $resultado = $conexao -> query($comando);
    $usuario = $resultado -> fetch_assoc();

    session_id($usuario["id"]);
    session_start();

    if ($usuario['tipo'] === "Aluno") {
        header("Location: ../views/aluno/index.php");
    } else if ($usuario['tipo'] === "Professor") {
        header("Location: ../views/professor/index.php");
    } else {
        header("Location: ../views/entrar.php?login=false");
    }
?>