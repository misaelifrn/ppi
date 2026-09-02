<?php

    class Funcionario {
        public $nome;
        public $salario;
        public $cargo;

        public function __construct($nome, $salario, $cargo) {
            $this->nome = $nome;
            $this->salario = $salario;
            $this->cargo = $cargo;
        }
    }

    $funcionario1 = new Funcionario("Thiago", 1000, "Professor");
    $funcionario2 = new Funcionario("Pedro", 2000, "Suporte de TI");
    $funcionario3 = new Funcionario("Mateus", 3000, "Suporte de TI");
    $funcionario4 = new Funcionario("Paulo", 4000, "Manutenção de Computadores");
    $funcionario5 = new Funcionario("Marcos", 6000, "Pedreiro");

    $funcionarios = [$funcionario1, $funcionario2, $funcionario3, $funcionario4, $funcionario5];

    $salarioTotal = 0;
    $maiorSalario = $funcionarios[0]->salario;
    $menorSalario = $funcionarios[0]->salario;
    $acimaDaMedia = 0;
    // foreach($funcionarios as $funcionario) {
    //     echo "Nome: ".$funcionario->nome." | Salário: R$".$funcionario->salario." | Cargo: ".$funcionario->cargo."\n";
    // }

    for($i = 0; $i < 5; $i++) {
        echo "Nome: ".$funcionarios[$i]->nome." | Salário: R$".$funcionarios[$i]->salario." | Cargo: ".$funcionarios[$i]->cargo."\n";

        if($funcionarios[$i]->salario > $maiorSalario) {
            $maiorSalario = $funcionarios[$i]->salario;
        }

        if($funcionarios[$i]->salario < $menorSalario) {
            $menorSalario = $funcionarios[$i]->salario;
        }

        $salarioTotal += $funcionarios[$i]->salario;
    }

    $mediaSalarial = $salarioTotal / count($funcionarios);
    echo "\nMédia salarial: R$$mediaSalarial\n";

    echo "\nMaior salário: R$$maiorSalario \n";

    echo "\nMenor salário: R$$menorSalario \n";

    for($i = 0; $i < count($funcionarios); $i++) {
        if($funcionarios[$i]->salario > $mediaSalarial) {
            $acimaDaMedia++;
        }
    }

    echo "\nQuantidade de funcionários com salário acima da média: \n- $acimaDaMedia funcionários\n\n";

    $salarioAntigo = 0;
    for($i = 0; $i < count($funcionarios); $i++) {
        if($funcionarios[$i]->salario < 2000) {
            $salarioAntigo = $funcionarios[$i]->salario;
            $funcionarios[$i]->salario = $salarioAntigo + ($funcionarios[$i]->salario * 15) / 100;
        } 
        
        if ($funcionarios[$i]->salario >= 2000 && $funcionarios[$i]->salario <= 5000) {
            $salarioAntigo = $funcionarios[$i]->salario;
            $funcionarios[$i]->salario = $salarioAntigo + ($funcionarios[$i]->salario * 10) / 100;
        }
        
        if ($funcionarios[$i]->salario > 5000) {
            $salarioAntigo = $funcionarios[$i]->salario;
            $funcionarios[$i]->salario = $salarioAntigo + ($funcionarios[$i]->salario * 5) / 100;
        }

        echo "Nome: ".$funcionarios[$i]->nome." | Salário antigo: R$".$salarioAntigo." | Salário novo: R$".$funcionarios[$i]->salario."\n";
    }

?>