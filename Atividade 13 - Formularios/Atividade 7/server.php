<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero = $_POST["numero"];
    
            for ($i = 1; $i <= 10; $i++) {
                $resultado = $numero * $i;
                echo "<p>" . $numero . " x " . $i . " = " . $resultado . "</p>";
            }
        } else {
            echo "Digite um número valido";
        }
    ?>
</body>
</html>