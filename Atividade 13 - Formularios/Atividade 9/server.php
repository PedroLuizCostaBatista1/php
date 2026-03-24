<?php
    $frase = $_GET["frase"];
    $resultado = strlen($frase);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de caracteres</title>
</head>
<body>
    <p>A frase que você digitou contem <?php echo $resultado?> caractere(s)</p>
</body>
</html>