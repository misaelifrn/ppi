<?php

    $numeros = [2, 5, 2, 8, 5, 2, 10, 8, 5, 5];
    $vezesDeDois = 0;
    $vezesDeCinco = 0;
    $vezesDeOito = 0;
    $vezesDeDez = 0;

    for($i = 0; $i < count($numeros); $i++) {
        if($numeros[$i] == 2) {
            $vezesDeDois++;
        } else if ($numeros[$i] == 5) {
            $vezesDeCinco++;
        } else if ($numeros[$i] == 8) {
            $vezesDeOito++;
        } else if ($numeros[$i] == 10) {
            $vezesDeDez++;
        }
    }

    echo "2 aparece $vezesDeDois vezes \n";
    echo "5 aparece $vezesDeCinco vezes \n";
    echo "8 aparece $vezesDeOito vezes \n";
    echo "10 aparece $vezesDeDez vezes \n";

?>