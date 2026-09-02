<?php

    $a = 15;
    $b = 32;
    $c = 21;

    if ($a > $b && $a > $c) {
        echo "Maior número: $a (a)";
    } else if ($b > $a && $b > $c) {
        echo "Maior número: $b (b)";
    } else {
        echo "Maior número: $c (c)";
    }

?>