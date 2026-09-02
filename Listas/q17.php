<?php
    // echo "b";
    $times = [
        ["nome" => "Time A", "vitorias" => 5, "empates" => 2, "derrotas" => 1], // 17
        ["nome" => "Time B", "vitorias" => 4, "empates" => 4, "derrotas" => 0], // 16
        ["nome" => "Time C", "vitorias" => 6, "empates" => 0, "derrotas" => 2], // 18
        ["nome" => "Time D", "vitorias" => 3, "empates" => 3, "derrotas" => 2] // 12
    ];

    $pontosA = 0;
    $pontosB = 0;
    $pontosC = 0;
    $pontosD = 0;
    $pontosTimes = [];

    $possuiMaisPontos = 0;
    $possuiMaisPontosNome = "";

    $possuiMenosPontos = 0;
    $possuiMenosPontosNome = "";

    $possuiMaisVitorias = $times[0]['vitorias'];
    $possuiMaisVitoriasNome = $times[0]['nome'];
    
    for($i = 0; $i < count($times); $i++) {
        if($i == 0) {
            $pontosA = ($times[$i]['vitorias'] * 3) + $times[$i]['empates'] + ($times[$i]['derrotas'] * 0);
        } else if($i == 1) {
            $pontosB = ($times[$i]['vitorias'] * 3) + $times[$i]['empates'] + ($times[$i]['derrotas'] * 0);
        } else if($i == 2) {
            $pontosC = ($times[$i]['vitorias'] * 3) + $times[$i]['empates'] + ($times[$i]['derrotas'] * 0);
        } else if($i == 3) {
            $pontosD = ($times[$i]['vitorias'] * 3) + $times[$i]['empates'] + ($times[$i]['derrotas'] * 0);
        } 
        
        if($pontosA > $pontosB && $pontosA > $pontosC && $pontosA > $pontosD) {
            $possuiMaisPontos = $pontosA;
            $possuiMaisPontosNome = $times[0]['nome'];
        } else if($pontosB > $pontosA && $pontosB > $pontosC && $pontosB > $pontosD) {
            $possuiMaisPontos = $pontosB;
            $possuiMaisPontosNome = $times[1]['nome'];
        } else if($pontosC > $pontosA && $pontosC > $pontosB && $pontosC > $pontosD) {
            $possuiMaisPontos = $pontosC;
            $possuiMaisPontosNome = $times[2]['nome'];
        } else if($pontosD > $pontosA && $pontosD > $pontosB && $pontosD > $pontosC) {
            $possuiMaisPontos = $pontosD;
            $possuiMaisPontosNome = $times[3]['nome'];
        }
        
        if($pontosA == $pontosB && $pontosA == $pontosC && $pontosA == $pontosD) {
            if($times[0]['vitorias'] > $times[$i]['vitorias']) {
                $possuiMaisPontos = $pontosA;
                $possuiMaisPontosNome = $times[0]['nome'];
            }
        } else if($pontosB == $pontosA && $pontosB == $pontosC && $pontosB == $pontosD) {
            if($times[1]['vitorias'] > $times[$i]['vitorias']) {
                $possuiMaisPontos = $pontosA;
                $possuiMaisPontosNome = $times[1]['nome'];
            }
        } else if($pontosC == $pontosA && $pontosC == $pontosB && $pontosC == $pontosD) {
            if($times[2]['vitorias'] > $times[$i]['vitorias']) {
                $possuiMaisPontos = $pontosA;
                $possuiMaisPontosNome = $times[2]['nome'];
            }
        } else if($pontosD == $pontosA && $pontosD == $pontosB && $pontosD == $pontosC) {
            if($times[3]['vitorias'] > $times[$i]['vitorias']) {
                $possuiMaisPontos = $pontosA;
                $possuiMaisPontosNome = $times[3]['nome'];
            }
        } 
        
        if($pontosA < $pontosB && $pontosA < $pontosC && $pontosA < $pontosD) {
            $possuiMenosPontos = $pontosA;
            $possuiMenosPontosNome = $times[0]['nome'];
        } else if($pontosB < $pontosA && $pontosB < $pontosC && $pontosB < $pontosD) {
            $possuiMenosPontos = $pontosB;
            $possuiMenosPontosNome = $times[1]['nome'];
        } else if($pontosC < $pontosA && $pontosC < $pontosB && $pontosC < $pontosD) {
            $possuiMenosPontos = $pontosC;
            $possuiMenosPontosNome = $times[2]['nome'];
        } else if($pontosD < $pontosA && $pontosD < $pontosB && $pontosD < $pontosC) {
            $possuiMenosPontos = $pontosD;
            $possuiMenosPontosNome = $times[3]['nome'];
        }
        
        if($possuiMaisVitorias < $times[$i]['vitorias']) {
            $possuiMaisVitorias = $times[$i]['vitorias'];
            $possuiMaisVitoriasNome = $times[$i]['nome'];
        } 
    }

    echo "- Possui mais pontos: \n";
    echo "Nome: $possuiMaisPontosNome | Pontos: $possuiMaisPontos \n";

    echo "\n- Possui menos pontos: \n";
    echo "Nome: $possuiMenosPontosNome | Pontos: $possuiMenosPontos \n";

    echo "\n- Possui mais vitórias: \n";
    echo "Nome: $possuiMaisVitoriasNome | Vítorias: $possuiMaisVitorias \n";

    // echo "\nPontos de A: $pontosA \nPontos de B: $pontosB \nPontos de C: $pontosC \nPontos de D: $pontosD \n";
    echo "\nPontos totais: ".$pontosA + $pontosB + $pontosC + $pontosD;
?>