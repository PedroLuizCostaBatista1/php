<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temperatura = $_POST["temperatura"];
        $operador = $_POST["operador"];

        switch ($operador) {
            case "Fahrenheit": {
                $resultado = ($temperatura * 9 / 5) + 32;
                $simbolo = "°F";
                break;
            }

            case "Celsius": {
                $resultado = $temperatura;
                $simbolo = "°C";
                break;
            }

            case "Kelvin": {
                $resultado = $temperatura + 273.15;
                $simbolo = "K";
            }
        }
    } else {
        echo "Digite uma temperatura valida";
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
    <p>A temperatura convertido para <?php echo strtolower($operador)?> fica: <?php echo $resultado . " " . $simbolo?></p>
</body>
</html>