<?php

    $numeros = [15, 8, 35, 42, 11, 27, 39];
    $maiorNumero = $numeros[0];
    $segundaMaiorNumero = $numeros[0];

    for($i = 0; $i < count($numeros); $i++) {
        if ($numeros[$i] > $maiorNumero) {
            $maiorNumero = $numeros[$i];
        }

        if ($numeros[$i] > $segundaMaiorNumero && $numeros[$i] < $maiorNumero) {
            $segundaMaiorNumero = $numeros[$i];
        }
    }

    echo "Maior número: $maiorNumero \nSegundo maior: $segundaMaiorNumero";
?>