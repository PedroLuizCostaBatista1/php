<?php
    include('../utils/conexao.php');

    $email = $_POST['email'];
    $comando = "SELECT * FROM usuario WHERE email = '$email'";
    $resultado = $conexao -> query($comando);
    $usuario = $resultado -> fetch_assoc();

    if ($usuario['tipo'] === "Aluno") {
        header("Location: ../views/aluno/index.php?id={$usuario['id']}");
    } else if ($usuario['tipo'] === "Professor") {
        header("Location: ../views/professor/index.php?id={$usuario['id']}");
    } else {
        header("Location: ../views/entrar.php?login=false");
    }
?>