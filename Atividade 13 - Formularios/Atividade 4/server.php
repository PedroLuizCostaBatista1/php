<?php
    $nome = $_GET["nome"];
    $sobrenome = $_GET["sobrenome"];
    $resultado = $nome . " " . $sobrenome;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <p>Nome completo: <?php echo $resultado; ?></p>
</body>
</html>