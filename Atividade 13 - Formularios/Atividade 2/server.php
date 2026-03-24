<?php
    $numero = $_GET["numero"];
    $resposta = "";

    if ($numero % 2 == 0) {
        $resposta = "par";
    } else {
        $resposta = "impar";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta</title>
</head>
<body>
    <p>O número <?php echo $numero?> é <?php echo $resposta?></p>
</body>
</html>