<?php

    $candidatos = [
        ["numero" => 10, "nome" => "Ana", "votos" => 0],
        ["numero" => 20, "nome" => "Carlos", "votos" => 0],
        ["numero" => 30, "nome" => "Maria", "votos" => 0]
    ];

    $votos = [10, 20, 10, 30, 30, 30, 20, 10, 50, 30, 20, 30, 50, 10,];

    $quantidadeDeVotosNulo = 0;
    $totalVotosValidos = 0;
    for($i = 0; $i < count($candidatos); $i++) {
        for($c = 0; $c < count($votos); $c++) {
            if ($votos[$c] == 10 && $i == 0) {
                $candidatos[$i]['votos']++;
                $totalVotosValidos++;
            } else if ($votos[$c] == 20 && $i == 1) {
                $candidatos[$i]['votos']++;
                $totalVotosValidos++;
            } else if ($votos[$c] == 30 && $i == 2) {
                $candidatos[$i]['votos']++;
                $totalVotosValidos++;
            } else { 
                $quantidadeDeVotosNulo++; // 2
            }
        }

        echo "Candidato: ".$candidatos[$i]['nome']." (".$candidatos[$i]['numero'].") | n° votos: ".$candidatos[$i]['votos']." votos \n";
    }

    echo "\nQuantidade de votos nulos: $quantidadeDeVotosNulo\n"; //////////////////////////////////////////////////////// votos nulo com erro

    echo "\nTotal de votos válidos: $totalVotosValidos \n"; //12
    
    echo "\nTotal geral de votos: ".count($votos)."\n"; // $totalVotosValidos + $quantidadeDeVotosNulo
    
    echo "\nPercentual de votos de cada candidato: \n";
    for($i = 0; $i < count($candidatos); $i++) {
        echo "Candidato: ".$candidatos[$i]['nome']." | Percentual de votos: ".($candidatos[$i]['votos'] * 100) / $totalVotosValidos."% (".$candidatos[$i]['votos'].")\n";
    }

    $votos = [];
    for($i = 0; $i < count($candidatos); $i++) {
        $votos[] = $candidatos[$i]['votos'];

        // if($candidatos[0]['votos'] > $candidatos[1]['votos'] && $candidatos[0]['votos'] > $candidatos[2]['votos']) {
        //     echo "\nCandidato vencedor: ".$candidatos[0]['nome']." (".$candidatos[0]['votos']." votos)";
        // } else if ($candidatos[1]['votos'] > $candidatos[0]['votos'] && $candidatos[1]['votos'] > $candidatos[2]['votos']) {
        //     echo "\nCandidato vencedor: ".$candidatos[1]['nome']." (".$candidatos[1]['votos']." votos)";
        // } else {
        //     echo "\nCandidato vencedor: ".$candidatos[2]['nome']." (".$candidatos[2]['votos']." votos)";
        // }
    }

    foreach($candidatos as $candidato) {
        if($candidato['votos'] == max($votos)) {
            echo "\nCandidato vencedor: ".$candidato['nome']." (".$candidato['votos']." votos)"; 
        }
    }

?>