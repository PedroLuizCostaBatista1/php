<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nota1 = $_POST["nota1"];
        $nota2 = $_POST["nota2"];
        $nota3 = $_POST["nota3"];
        $media = ($nota1 + $nota2 + $nota3) / 3;

        if ($media >= 7.0) {
            $resultado = "Você foi aprovado!!!!!!";
        } else {
            $resultado = "Você foi reaprovado!!!!! xD";
        }
    } else {
        echo "Digite as três notas corretamente";
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
    <p>Você tem uma media de <?php echo $media ?></p>
    <p><?php echo $resultado ?></p>
</body>
</html>