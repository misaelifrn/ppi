<?php

    $numero = 7;
    $contadorPrimo = 0;

    for($i = 1; $i <= $numero; $i++) {
        if ($numero % $i == 0) { // 7 / 1 = 7 (resto 0), 7 / 7 = 1 (resto 0)
            $contadorPrimo++;
        }
    }

    if($contadorPrimo == 2) {
        echo "$numero é primo.";
    } else {
        echo "$numero não é primo.";
    }
    
?>