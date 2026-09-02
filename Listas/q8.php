<?php

    $numero = 5;
    $valorInicialNumero = $numero;
    echo "$numero! = ";
    $resultado = 1;
    for($i = 0; $i < $valorInicialNumero; $i++) {
        $resultado = $resultado * $numero;
        if ($numero == 1) {
            echo $numero--;
        } else {
            echo $numero--." x ";
        }
    }
    echo " = $resultado";
?>