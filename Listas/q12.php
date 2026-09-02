<?php

    $notas = [7.5, 4.0, 8.5, 6.0, 9.0, 3.5, 10.0, 5.5];
    $mediaTurma = 0;
    $quantAlunosNotaMaior = 0;
    $quantAlunosNotaMenor = 0;
    $maiorNota = $notas[0];
    $menorNota = $notas[0];

    $somatorioNotas = 0;
    for($i = 0; $i < count($notas); $i++) {
        $somatorioNotas = $somatorioNotas + $notas[$i];
        $mediaTurma = $somatorioNotas / count($notas);

        if ($notas[$i] >= 6) {
            $quantAlunosNotaMaior++;
        }

        if ($notas[$i] < 6) {
            $quantAlunosNotaMenor++;
        }

        if ($notas[$i] > $maiorNota) {
            $maiorNota = $notas[$i];
        }

        if ($notas[$i] < $menorNota) {
            $menorNota = $notas[$i];
        }
    }

    echo "Média da turma: $mediaTurma \nAlunos que possuem nota maior ou igual a 6: $quantAlunosNotaMaior \nAlunos que possuem nota menor que 6: $quantAlunosNotaMenor \nMaior nota: $maiorNota \nMenor nota: $menorNota";
?>