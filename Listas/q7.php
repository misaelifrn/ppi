<?php

    $i = 20;
    while($i >= 0) {
        if ($i % 5 == 0) {
            echo "$i Múltiplo de 5 \n";
        } else {
            echo "$i\n";
        }

        $i--;
    }
    echo "Contagem encerrada!";

?>