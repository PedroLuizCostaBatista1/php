<?php
    include('../utils/conexao.php');

    $email = $_POST['email'];
    $comando = "SELECT * FROM usuario WHERE email = '$email'";
    $resultado = $conexao -> query($comando);
    $usuario = $resultado -> fetch_assoc();

    if ($usuario['tipo'] === "Aluno") {
        header("Location: ../views/aluno/index.html");
    } else if ($usuario['tipo'] === "Professor") {
        header("Location: ../views/professor/index.html");
    } else {
        header("Location: ../views/entrar.php?login=false");
    }
?>