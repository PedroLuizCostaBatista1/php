<?php
    $nomeDefinido = "admin";
    $senhaDefinido = 12345;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $senha = $_POST["senha"];

        if ($nomeDefinido == $nome and $senhaDefinido == $senha) {
            $resultado = "Bem-vindo de volta ademiro";
        } else {
            $resultado = "Nome e senha invalidos ademiro";
        }
    } else {
        echo "Preenche o nome e a senha";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <p><?php echo $resultado?></p>
</body>
</html>