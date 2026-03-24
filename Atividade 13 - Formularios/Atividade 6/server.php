<?php
    $idade = $_GET["idade"];

    if ($idade >= 18) {
        $resultado = "maior";
    } else {
        $resultado = "menor";
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
    <p>Você é de <?php echo $resultado?></p>
</body>
</html>