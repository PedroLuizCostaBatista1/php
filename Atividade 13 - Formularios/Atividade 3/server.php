<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];
        $operador = $_POST["operador"];

        switch ($operador) {
            case "Adição": {
                $resultado = $numero1 + $numero2;
                break;
            }

            case "Subtração": {
                $resultado = $numero1 - $numero2;
                break;
            }

            case "Multiplicação": {
                $resultado = $numero1 * $numero2;
                break;
            }

            case "Divisão": {
                $resultado = $numero1 / $numero2;
            }
        }
    } else {
        echo "Digite os dois números e selecione o operador";
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
    <p>Resultado da <?php echo strtolower($operador);?>: <?php echo $resultado; ?></p>
</body>
</html>