<?php

    $a = 0;
    $b = 1;
    for($i = 0; $i < 15; $i++) {
        echo "$a ";
        $c = $a + $b;
        $a = $b;
        $b = $c;
    }
    
?>