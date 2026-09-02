<?php

    $alunos = [
        ["nome" => "Ana", "nota1" => 8.0, "nota2" => 7.01],
        ["nome" => "Carlos", "nota1" => 5.0, "nota2" => 4.5],
        ["nome" => "Maria", "nota1" => 9.0, "nota2" => 9.5],
        ["nome" => "João", "nota1" => 6.0, "nota2" => 5.0],
        ["nome" => "Pedro", "nota1" => 3.0, "nota2" => 7.0],
    ];

    $media = 0;
    $situacao = "";

    $maiorMediaNome = "";
    $maiorMedia = ($alunos[0]['nota1'] + $alunos[0]['nota2']) / 2;
    $menorMediaNome = "";
    $menorMedia = ($alunos[0]['nota1'] + $alunos[0]['nota2']) / 2;
    $mediaGeral = 0;

    for($i = 0; $i < count($alunos); $i++) {
        $media = ($alunos[$i]['nota1'] + $alunos[$i]['nota2']) / 2;
        if ($media >= 6) {
            $situacao = "Aprovado";
        } else {
            $situacao = "Reprovado";    
        }

        echo "Nome: ".$alunos[$i]['nome']." | Média: $media ($situacao) \n";

        if ($media > $maiorMedia) {
            $maiorMedia = $media;
            $maiorMediaNome = $alunos[$i]['nome'];
        }
        
        if ($menorMedia > $media) {
            $menorMedia = $media;
            $menorMediaNome = $alunos[$i]['nome'];
        }

        if ($i == count($alunos) - 1) {
            $mediaGeral = ($mediaGeral + $media) / count($alunos);
        } else {
            $mediaGeral = ($mediaGeral + $media);
        }
    }

    echo "\nAluno com maior média: $maiorMediaNome ($maiorMedia) \n";
    echo "Aluno com menor média: $menorMediaNome ($menorMedia) \n";
    echo "Média geral: $mediaGeral";
?>