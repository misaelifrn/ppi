<?php

    $numero = 15;
    if ($numero % 3 == 0 && $numero % 5 == 0) {
        echo "É múltiplo de 3 e 5";
    } else if ($numero % 3 == 0) {
        echo "É múltiplo de 3: ".$numero." / "."3 = ".$numero/3;
    } else if ($numero % 5 == 0) {
        echo "É múltiplo de 5: ".$numero." / "."5 = ".$numero/5;
    } else {
        echo "Não é múltiplo de 3 e 5";
    }

?>