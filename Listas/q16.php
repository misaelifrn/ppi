<?php

    $produtos = [
        ["nome" => "Teclado", "preco" => 120, "quantidade" => 5],
        ["nome" => "Mouse", "preco" => 60, "quantidade" => 0],
        ["nome" => "Monitor", "preco" => 900, "quantidade" => 3],
        ["nome" => "Cabo HDMI", "preco" => 35, "quantidade" => 10],
        ["nome" => "Headset", "preco" => 250, "quantidade" => 2]
    ];

    echo "- Produtos disponíveis \n";
    for($i = 0; $i < count($produtos); $i++) {
        if($produtos[$i]['quantidade'] > 0) {
            echo "Nome: ".$produtos[$i]['nome'].", Preço: R$".$produtos[$i]['quantidade']." \n";
        }
    }

    echo "\n- Produtos sem estoque (quantidade = 0) \n";
    for($i = 0; $i < count($produtos); $i++) {
        if($produtos[$i]['quantidade'] == 0) {
            echo "O produto ".$produtos[$i]['nome']." está sem estoque\n";
        }
    }

    echo "\n- Valor total de cada produto em estoque \n";
    for($i = 0; $i < count($produtos); $i++) {
        if($produtos[$i]['quantidade'] > 0) {
            echo "Nome: ".$produtos[$i]['nome'].", Valor total: R$".($produtos[$i]['preco'] * $produtos[$i]['quantidade'])." \n";
        }
    }

    $valorTotalEstoque = 0;
    for($i = 0; $i < count($produtos); $i++) {
        if($produtos[$i]['quantidade'] > 0) {
            $valorTotalEstoque += $produtos[$i]['preco'] * $produtos[$i]['quantidade'];
        }
    }
    echo "\n- Valor total de todo o estoque: R$$valorTotalEstoque \n";
    
    $maiorValor = $produtos[0]['preco'] * $produtos[0]['quantidade'];
    $nomeMaiorValor = "";
    echo "\n- Maior valor financeiro em estoque \n";
    for($i = 0; $i < count($produtos); $i++) {
        if($produtos[$i]['quantidade'] > 0) {
            if ($maiorValor < $produtos[$i]['preco'] * $produtos[$i]['quantidade']) {
                $maiorValor = $produtos[$i]['preco'] * $produtos[$i]['quantidade'];
                $nomeMaiorValor = $produtos[$i]['nome'];
            }
        }
    }
    echo "Nome: $nomeMaiorValor, Valor total: R$$maiorValor\n";
?>