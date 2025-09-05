<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Calculadora de IMC - VidaTech</title>
<style>
        body {
            font-family: Times New Roman, sans-serif;
            padding: 0;
            margin: 0;
            background-color: #F0F8FF;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: 	#DCDCDC;
            padding: 40px;
            border: solid 1px #000000;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 8px;
            width: 100%;
            background-color: #C0C0C0;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
        }
        .resultado {
            margin-top: 20px;
            background-color: #DCDCDC;
            padding: 15px;
            border-left: 5px solid #000000;
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }
</style>
</head>
<body>
 
    <div>
<h2>Calculadora de IMC - Clínica VidaTech</h2>
 
        <form method="POST">
<label>Peso (kg):</label>
<input type="number" name="peso" step="0.01" required>
 
            <label>Altura (m):</label>
<input type="number" name="altura" step="0.01" required>
 
            <input type="submit" value="Calcular IMC">
</form>
 
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $peso = floatval($_POST['peso']);
            $altura = floatval($_POST['altura']);
 
            if ($peso > 0 && $altura > 0) {
                $imc = $peso / ($altura * $altura);
                $imc = round($imc, 2);
 
                
                if ($imc < 17) {
                    $classificacao = "Toma cuidado ao tomar banho para não cair no ralo";
                } elseif ($imc < 18.5) {
                    $classificacao = "Abaixo do peso";
                } elseif ($imc < 25) {
                    $classificacao = "Peso normal";
                } elseif ($imc < 30) {
                    $classificacao = "Sobrepeso";
                } elseif ($imc < 35) {
                    $classificacao = "Obesidade grau I";
                } elseif ($imc < 40) {
                    $classificacao = "Obesidade grau II";
                } elseif ($imc < 55) {
                    $classificacao = "Obesidade grau III";
                } else {
                    $classificacao = "Você não é um ser humano e sim um planeta!!";
                }
 
                echo "<div class='resultado'>
<strong>Resultado:</strong><br>
                        Peso: $peso;<br>
                        Altura: $altura;<br>
                        IMC: $imc <br>
                        Classificação: $classificacao
</div>";
            } else {
                echo "<p style='color:red;'>Por favor, insira valores válidos para peso e altura.</p>";
            }
        }
        ?>
 
    </div>
 
</body>
</html>