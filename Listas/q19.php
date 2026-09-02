<?php

    class Produto {
        public $nome;
        public $preco;
        public $quantidade;

        public function __construct($nome, $preco, $quantidade) {
            $this->nome = $nome;
            $this->preco = $preco;
            $this->quantidade = $quantidade;
        }
    }

    $produto1 = new Produto("Feijão", 6.50, 9);
    $produto2 = new Produto("Arroz", 3.90, 10);
    $produto3 = new Produto("Macarrão", 5.50, 8);
    $produto4 = new Produto("Sabão", 20.90, 3);
    $produto5 = new Produto("Desodorante", 9.90, 4);
    $produtos = [$produto1, $produto2, $produto3, $produto4, $produto5];

    $valorTotalCompra = 0;
    foreach($produtos as $produto) {
        // echo "Nome: ".$produto->nome." | Subtotal: R$".$produto->preco * $produto->quantidade." (R$$produto->preco x $produto->quantidade)\n";
        echo "Nome: ".$produto->nome." | Quantidade: ".$produto->quantidade." | Preço (unitário): R$".$produto->preco." | Subtotal: R$".$produto->preco * $produto->quantidade."\n";

        $valorTotalCompra += $produto->preco * $produto->quantidade;
    }

    echo "\nValor total da compra: R$$valorTotalCompra\n\n";

    if($valorTotalCompra <= 200) {
        // echo "\nValor total da compra: R$$valorTotalCompra\n\n";
    } else if($valorTotalCompra >= 200.01 && $valorTotalCompra <= 500) {
        echo "Percentual de desconto: 5% \n\n";
        echo "Valor economizado: R$".($valorTotalCompra * 5) / 100 ."\n\n";
        echo "Valor final da compra: R$".$valorTotalCompra - ($valorTotalCompra * 5) / 100 ."\n\n";
    } else if($valorTotalCompra >= 500.01 && $valorTotalCompra <= 1000) {
        echo "Percentual de desconto: 10% \n\n";
        echo "Valor economizado: R$".($valorTotalCompra * 10) / 100 ."\n\n";
        echo "Valor final da compra: R$".$valorTotalCompra - ($valorTotalCompra * 10) / 100 ."\n\n";
    } else if($valorTotalCompra > 1000) {
        echo "Percentual de desconto: 15% \n\n";
        echo "Valor economizado: R$".($valorTotalCompra * 15) / 100 ."\n\n";
        echo "Valor final da compra: R$".$valorTotalCompra - ($valorTotalCompra * 15) / 100 ."\n\n";
    }
    
    $nomeMaiorGasto = "";
    $precoMaiorGasto = 0;
    $quantidadeMaiorGasto = 0;
    $subtotalMaiorGasto = $produtos[0]->preco * $produtos[0]->quantidade;
    foreach($produtos as $produto) {
        if($subtotalMaiorGasto < ($produto->preco * $produto->quantidade)) {
            $subtotalMaiorGasto = $produto->preco * $produto->quantidade;
            $nomeMaiorGasto = $produto->nome;
            $precoMaiorGasto = $produto->preco;
            $quantidadeMaiorGasto = $produto->quantidade;
        }
    }

    echo "\n- Produto com maior gasto do carrinho: \n";
    echo "Nome: $nomeMaiorGasto | Gasto: R$$subtotalMaiorGasto (Preço: R$$precoMaiorGasto * Quantidade: $quantidadeMaiorGasto)";
?>