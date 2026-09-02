<?php

    $numeros = [45, 12, 89, 3, 67, 21, 100, 8, 55];
    $maiorNum = $numeros[0];
    $menorNum = $numeros[0];
    $posicaoMaior = 0;
    $posicaoMenor = 0;
    for($i = 0; $i < count($numeros); $i++) {
        if ($numeros[$i] > $maiorNum) {
            $maiorNum = $numeros[$i];
            $posicaoMaior = $i;
        }
            
        if ($numeros[$i] < $menorNum) {
            $menorNum = $numeros[$i];
            $posicaoMenor = $i;
        }
    }
    // echo "Maior número: $maiorNum (posição ".array_search($maiorNum, $numeros).") | Menor número: $menorNum (posição ".array_search($menorNum, $numeros).")";
    echo "Maior número: $maiorNum (posição $posicaoMaior) | Menor número: $menorNum (posição $posicaoMenor)";

?>